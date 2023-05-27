<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Order;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detail::with('product', 'order')->get();

        return view('detail.index')
            ->with('details', $detail);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $orders = Order::all();

        return view('details.create')
            ->with('products', $products)
            ->with('orders', $orders);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'order_id' => 'required|exists:orders,id'
        ]);

        $detail = new Detail();
        $detail->product_id = $request->product_id;
        $detail->quantity = $request->quantity;
        $detail->order_id = $request->order_id;
        $detail->save();

        return redirect("/orders")->with('success', 'Detail created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = Detail::find($id);
        $product = Product::find($detail->product_id);

        return view('details.show', compact('detail', 'product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]); 

        $detail = Detail::find($id);

        $detail->quantity = $request->quantity;
        $detail->save();

        return redirect("/orders/".$detail->order_id)->with('success', 'Detail updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = Detail::find($id);

        $detail->delete();

        return redirect()->route('details.index')->with('success', 'Detalle eliminado correctamente');
    }
}
