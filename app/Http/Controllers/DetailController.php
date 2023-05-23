<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Order;

class DetailControler extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = Detail::find($id);
        $product = Product::find($detail->product_id);

        return view('details.show');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
