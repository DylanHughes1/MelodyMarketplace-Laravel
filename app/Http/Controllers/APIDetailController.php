<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class APIDetailController extends Controller
{

    /**
     * @OA\Get(
     *     path="/rest/details",
     *     summary="Obtiene todos los detalles",
     *     tags={"Details"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer",description="Detail ID"),
     *             @OA\Property(property="quantity", type="integer", description="Quantity"),
     *             @OA\Property(property="product_id", type="integer", description="Product ID"),
     *             @OA\Property(property="order_id", type="integer", description="Order ID")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Details not found.",
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
        $details = Detail::all();

        return response()->json([
            'details' => $details,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $detail = new Detail();
        $detail->product_id = $request->input('product_id');
        $detail->order_id = $request->input('order_id');
        $detail->quantity = $request->input('quantity');
        $detail->save();

        return response()->json(['message' => 'Detail created successfully.', 'detail' => $detail], 201);
    }

    /**
     * @OA\Post(
     *     path="/rest/details",
     *     summary="Crea y almacena un nuevo detalle",
     *     tags={"Details"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(property="detail_id", type="integer"),
     *                 @OA\Property(property="product_id", type="integer"),
     *                 @OA\Property(property="quantity", type="integer"),
     *                 @OA\Property(property="order_id", type="integer")
     * 
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
            'product_id' => 'required|exists:products,id',
            'pedido_id' => 'required|exists:pedidos,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $detail = new Detail();
        $detail->product_id = $request->input('product_id');
        $detail->pedido_id = $request->input('pedido_id');
        $detail->quantity = $request->input('quantity');
        $detail->save();

        return response()->json(['message' => 'Detalle creado exitosamente.', 'detail' => $detail], 201);
    }

    /**
     * @OA\Get(
     *     path="/rest/details/{id}",
     *     summary="Obtiene un detalle específico a partir de su ID",
     *     tags={"Details"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Detail ID",
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
     *             @OA\Property(property="detail", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Detail not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $detail = Detail::findOrFail($id);

        return response()->json(['detail' => $detail]);
    }

    /**
     * @OA\Put(
     *     path="/rest/details/{id}",
     *     summary="Actualiza el detalle identificado por ID",
     *     tags={"Details"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the detail",
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
     *                 @OA\Property(property="detail_id", type="integer"),
     *                 @OA\Property(property="product_id", type="integer"),
     *                 @OA\Property(property="quantity", type="integer"),
     *                 @OA\Property(property="order_id", type="integer")
     * 
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detail updated successfully",
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
     *         description="Detail not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $detail = Detail::findOrFail($id);
        $detail->product_id = $request->input('product_id');
        $detail->quantity = $request->input('quantity');
        $detail->save();

        return response()->json(['message' => 'Detalle actualizado exitosamente.', 'detail' => $detail]);
    }

    /**
     * @OA\Delete(
     *     path="/rest/details/{id}",
     *     summary="Elimina el detalle a partir de su ID",
     *     tags={"Details"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the detail",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detail deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Detail not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        $detail = Detail::findOrFail($id);
        $detail->delete();

        return response()->json(['message' => 'Detalle eliminado exitosamente.']);
    }
}
