<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class APIDetailController extends Controller
{
    public function index()
    {
        $details = Detail::all();
        $products = Product::orderBy('id', 'asc')->paginate(15);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return response()->json([
            'details' => $details,
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories
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

    public function show($id)
    {
        $detail = Detail::findOrFail($id);

        return response()->json(['detail' => $detail]);
    }

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

    public function destroy($id)
    {
        $detail = Detail::findOrFail($id);
        $detail->delete();

        return response()->json(['message' => 'Detalle eliminado exitosamente.']);
    }
}
