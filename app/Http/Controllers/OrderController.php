<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function index()
    {
        try {
            $order = Order::with('details')->get();

            return response()->json(['order' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los pedidos'], 500);
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            // Otros campos requeridos para crear un pedido
        ]);

        $order = new Order();
        $order->user_id = $request->input('user_id');
        // Setear otros campos del pedido según corresponda
        $order->save();

        return response()->json(['message' => 'Pedido creado exitosamente.', 'pedido' => $order], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);

            $order->estado = $request->input('estado', $order->estado);
            $order->total = $request->input('total', $order->total);

            $order->save();

            return response()->json(['message' => 'Pedido actualizado correctamente', 'pedido' => $order]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al actualizar el pedido'], 500);
        }
    }

    public function get(Request $request, $id)
    {
        $order = Order::with('detalles')->find($id);

        if (!$order) {
            return response()->json(['error' => 'Pedido no encontrado.'], 404);
        }

        return response()->json(['pedido' => $order]);
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            $detail = $order->detail;

            return response()->json(['order' => $order, 'detail' => $detail]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'El pedido especificado no existe'], 404);
        }
    }


    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return response()->json(['message' => 'Pedido eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al eliminar el pedido'], 500);
        }
    }
}
