<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

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
     *     summary="Crea y almacena un nuevo pedido",
     *     tags={"Orders"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(property="user_id", type="integer"),
     *                 @OA\Property(property="delivery_address", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Order created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'delivery_address' => 'required',
        ]);

        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->delivery_address = $request->input('delivery_address');
        $order->save();

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
        $order = Order::findOrFail($id);

        return response()->json(['order' => $order]);
    }

    /**
     * @OA\Put(
     *     path="/rest/orders/{id}",
     *     summary="Actualiza el pedido identificado por ID",
     *     tags={"Orders"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the order",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(property="user_id", type="integer"),
     *                 @OA\Property(property="delivery_address", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'delivery_address' => '',
        ]);

        $order = Order::findOrFail($id);

        if ($request->has('user_id')) {
            $order->user_id = $request->input('user_id');
        }
        if ($request->has('delivery_address')) {
            $order->delivery_address = $request->input('delivery_address');
        }
        $order->save();

        return response()->json(['message' => 'Orden actualizada exitosamente.', 'order' => $order]);
    }

    /**
     * @OA\Delete(
     *     path="/rest/orders/{id}",
     *     summary="Elimina el pedido a partir de su ID",
     *     tags={"Orders"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the order",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
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
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Orden eliminada exitosamente.']);
    }
}
