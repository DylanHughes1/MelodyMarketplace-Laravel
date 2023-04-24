<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        return view('products.index')
            ->with('products',$products)
            ->with('categories',$categories)
            ->with('subcategories',$subcategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        if($product==null)
            abort(404);

        return view('products.show')
            ->with('product',$product)
            ->with('categories',$categories)
            ->with('subcategories',$subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'price' => 'nullable|numeric|gt:0',
            'subcategory' => 'integer',
        ]);

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->subcategory_id = $request->input('subcategory');
        
        $product->update();
       
        return redirect("/products/".$product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $product = Product::find($id);
        $product->delete();

        return redirect("/products");
    }
}
