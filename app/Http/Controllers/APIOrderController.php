<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class APIOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return response()->json(['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'delivery_address' => 'required',
            // Otros campos requeridos para crear una orden
        ]);

        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->delivery_address = $request->input('delivery_address');
        // Setear otros campos de la orden según corresponda
        $order->save();

        return response()->json(['message' => 'Orden creada exitosamente.', 'order' => $order], 201);
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return response()->json(['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'exists:users,id',
            'delivery_address' => '',
            // Otros campos opcionales para actualizar la orden
        ]);

        $order = Order::findOrFail($id);

        if ($request->has('user_id')) {
            $order->user_id = $request->input('user_id');
        }
        if ($request->has('delivery_address')) {
            $order->delivery_address = $request->input('delivery_address');
        }
        // Actualizar otros campos de la orden según corresponda
        $order->save();

        return response()->json(['message' => 'Orden actualizada exitosamente.', 'order' => $order]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Orden eliminada exitosamente.']);
    }
}
