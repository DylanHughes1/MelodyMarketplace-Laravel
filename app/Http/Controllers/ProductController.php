<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(15);
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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('products.create')
            ->with('categories',$categories)
            ->with('subcategories',$subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|gt:0',
            'subcategory' => 'required|integer',
            'image' => 'required|image|max:1000'
        ]);

        try{
            $image = $request->file('image');
            $uploadedFile = $image->storeOnCloudinary('/products');
        }catch (Exception $e){
            return redirect("/products")->withErrors("Ocurrió un error al almacenar la imagen\n");
        }

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->subcategory_id = $request->get('subcategory');
        $product->hasStock = true;
        $product->image_link = $uploadedFile->getPath();
        $product->image_path = $uploadedFile->getPublicId();

        $product->save();

        return redirect("/products");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product==null)
            abort(404);

        $subcategories = Subcategory::all();

        return view('products.show')
            ->with('product', $product)
            ->with('subcategories', $subcategories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    public function editStock(string $id)
    {
        $product = Product::find($id);
        
        if ($product->hasStock){
            $product->hasStock = false;
        } 
        else if (!$product->hasStock){
            $product->hasStock = true;
        }

        $product->save();

        return redirect("/products/".$product->id);
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


            if($request->has('image')){

                $image = $request->file('image');
                if($product->image_path != null){
                            Cloudinary::destroy($product->image_path);  
                }

                $uploadedFile = $image->storeOnCloudinary('products');
                $product->image_link = $uploadedFile->getSecurePath();
                $product->image_path = $uploadedFile->getPublicId();
            }
            $product->save();
        
        
        return redirect("/products/".$product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
