<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Client;
use App\Models\Detail;

class APIOrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/rest/orders",
     *     summary="Obtiene todos los pedidos",
     *     tags={"Orders"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="Order ID."
     *                 ),
     *                 @OA\Property(
     *                     property="delivery_address",
     *                     type="string",
     *                     description="Customer delivery address."
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Orders not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 description="Error message."
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $orders = Order::all();

        return response()->json(['orders' => $orders]);
    }

    /**
     * @OA\Post(
     *     path="/rest/orders",
     *     summary="Create and store a new order",
     *     tags={"Orders"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"delivery_address", "email", "name", "details"},
     *                 @OA\Property(property="delivery_address", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="details", type="array",
     *                     @OA\Items(
     *                         @OA\Property(property="quantity", type="integer"),
     *                         @OA\Property(property="product_id", type="integer"),
     *                     )
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Order created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="order", type="object",
     *                 @OA\Property(property="delivery_address", type="string"),
     *                 @OA\Property(property="client_id", type="integer"),              
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'delivery_address' => 'required',
            'email' => 'required',
            'name' => 'required',
            'details' => 'required',
        ]);

        $client = Client::where('email', $request->input('email'))->get();
        if (!$client->isEmpty()) {
            $order = new Order();
            $order->delivery_address = $request->input('delivery_address');
            $order->mpID = $request->input('mpID');
            $order->client_id = $client->first()->id();      
        } else {
            $newClient = new Client();
            $newClient->name = $request->input('name');
            $newClient->email = $request->input('email');
            $newClient->save();

            $order = new Order();
            $order->delivery_address = $request->input('delivery_address');
            $order->mpID = $request->input('mpID');
            $order->client_id = $newClient->id;
        }

        $order->save();

        $details = $request->input('details');
        foreach ((array) $details as $detail) {
            $newDetail = new Detail();
            $newDetail->quantity = $detail['quantity'];
            $newDetail->product_id = $detail['product_id'];
            $newDetail->order_id = $order->id;
            $newDetail->save();
        }

        return response()->json(['message' => 'Orden creada exitosamente.', 'order' => $order], 201);
    }

    /**
     * @OA\Get(
     *     path="/rest/orders/{id}",
     *     summary="Obtiene un pedido específico a partir de su ID",
     *     tags={"Orders"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Order ID",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="order", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Order not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $order = Order::find($id);

        return response()->json(['order' => $order]);
    }


    public function getOrdersByUserToken(Request $request)
    {
        $currentUser = auth()->guard('api')->user();

        if (!$currentUser)
            return response()->json(['status' => 'Invalid Token.'], 401);

        $client = Client::where('email', $currentUser->email)->first();
        
        $orders = Order::where('client_id', $client->id)->get();

        return response()->json(['orders' => $orders], 200);
    }
}
