<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class APIProductController extends Controller
{
    /**
 * @OA\Info(title="My First API", version="0.1")
 * 
 * @OA\Get(
 *     path="/api/users",
 *     @OA\Response(response="200", description="An example endpoint")
 * )
 */

    public function index(){

        $products = Product::orderBy('id', 'asc')->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        
        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    public function create(){

        $categories = Category::all();
        $subcategories = Subcategory::all();
        return response()->json([
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function store(Request $request){
        
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
            return response()->json([
                'message' => "Ocurrió un error al almacenar la imagen\n"
            ], 400);
        }

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->subcategory_id = $request->get('subcategory');
        $product->hasStock = true;
        $product->image_link = $uploadedFile->getPath();
        $product->image_path = $uploadedFile->getPublicId();

        $product->save();

        return response()->json([
            'message' => 'Product created successfully'
        ], 201);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        if($product == null)
            return response()->json(['error' => 'Producto no encontrado'], 404);

        $categories = Category::all();
        $subcategories = Subcategory::all();

        return response()->json([
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }
    public function editImage(string $id)
    {
        $product = Product::find($id);
        if($product == null)
            return response()->json(['error' => 'Producto no encontrado'], 404);

        if($product->hasStock)
            $product->hasStock = false;
        $product->save();

        return response()->json([
            'message' => 'Image edited successfully'
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if($product == null)
            return response()->json(['error' => 'Producto no encontrado'], 404);

        $request->validate([
            'name' => 'string|max:255',
            'price' => 'nullable|numeric|gt:0',
            'subcategory' => 'integer',
        ]);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->subcategory_id = $request->input('subcategory');

        if ($request->has('image')) {
            $request->validate([
                'image' => 'required|image|max:1000'
            ]);

            if($product->image_path != null){
                Cloudinary::destroy($product->image_path);  
            }

            $image = $request->file('image');
            $uploadedFile = $image->storeOnCloudinary('products');
            $product->image_link = $uploadedFile->getSecurePath();
            $product->image_path = $uploadedFile->getPublicId();
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully'
        ], 201);
    }

    }
