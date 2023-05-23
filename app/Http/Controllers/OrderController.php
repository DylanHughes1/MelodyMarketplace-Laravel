<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('details')->paginate(10);

        return view('orders.index', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required|array',
            'details.*.product_id' => 'required|exists:products,id',
            'details.*.size' => 'required|integer|min:1'
        ]);

        $order = new Order();
        $order->save();

        $details = [];

        foreach ($request->detalles as $detalleData) {
            $detail = new Detail();
            $detail->pedido_id = $detail->id;
            $detail->producto_id = $detalleData['product_id'];
            $detail->cantidad = $detalleData['size'];
            $detail->save();

            $details[] = $detail;
        }

        return redirect("/orders");
    }


    public function create()
    {
        $orders = Order::select('id')
            ->orderBy('id', 'asc')
            ->get();
        return view('orders.create')->with('orders', $orders);
    }


    public function update(Request $request, $id)
    {
    }

    public function get($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('order.index')->with('error', 'Pedido no encontrado.');
        }

        return view('order.show')->with('order', $order);
    }


    public function show($id)
    {
        $order = Order::find($id);

        if($order==null)
            abort(404);

        return view('orders.show')->with('order', $order);
    }



    public function destroy($id)
{
    $order = Order::find($id);

    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente.');
}

}
