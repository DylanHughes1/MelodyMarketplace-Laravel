<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Intervention\Image\Facades\Image;

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

    }

    public function editImage(string $id)
    {
        $product = Product::find($id);
        $image = Image::make($product->image_link);
        $image->greyscale();

        //Ver como almacenar

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
