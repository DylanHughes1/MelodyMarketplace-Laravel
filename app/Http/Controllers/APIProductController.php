<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Controllers\Controller;

class APIProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     summary="Obtiene todos los productos con las categorías y subcategorías",
     *     tags={"Products"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="products", type="array",
     *                 @OA\Items(type="object",
     *                     @OA\Property(property="id", type="integer", example="1"),
     *                     @OA\Property(property="name", type="string", example="Guitarra Fender"),
     *                     @OA\Property(property="price", type="number", example="100000"),
     *                     @OA\Property(property="subcategory_id", type="integer", example="1")
     *                 )
     *             ),
     *             @OA\Property(property="categories", type="array",
     *                 @OA\Items(type="object",
     *                     @OA\Property(property="id", type="integer",example="1"),
     *                     @OA\Property(property="name", type="string", example="Guitarra")
     *                 )
     *             ),
     *             @OA\Property(property="subcategories", type="array",
     *                 @OA\Items(type="object",
     *                     @OA\Property(property="id", type="integer", example="1"),
     *                     @OA\Property(property="name", type="string", example="Guitarra Electrica")
     *                 )
     *             )
     *         )
     *     )
     * )
     */

    public function index()
    {

        $products = Product::orderBy('id', 'asc')->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/products/",
     *     summary="Obtiene todas las categorias y subcategorías",
     *     tags={"Products"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="categories", type="array",
     *                 @OA\Items(type="object",
     *                     @OA\Property(property="id", type="integer", example="1"),
     *                     @OA\Property(property="name", type="string", example="Guitarra")
     *                 )
     *             ),
     *             @OA\Property(property="subcategories", type="array",
     *                 @OA\Items(type="object",
     *                     @OA\Property(property="id", type="integer", example="1"),
     *                     @OA\Property(property="name", type="string", example="Guitarra Electrica")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function create()
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();
        return response()->json([
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/products/create",
     *     summary="Crea y almacena un nuevo producto",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Product data",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="name", type="string", maxLength=255),
     *                 @OA\Property(property="price", type="integer", minimum=1),
     *                 @OA\Property(property="subcategory", type="integer"),
     *                 @OA\Property(property="image", type="string", format="binary")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error in image storage",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|gt:0',
            'subcategory' => 'required|integer',
            'image' => 'required|image|max:1000'
        ]);

        try {
            $image = $request->file('image');
            $uploadedFile = $image->storeOnCloudinary('/products');
        } catch (Exception $e) {
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

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     summary="Muestra un producto especifico a partir de un ID",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product ID",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product details",
     *         @OA\JsonContent(
     *             @OA\Property(property="product", type="object"),
     *             @OA\Property(property="category", type="object"),
     *             @OA\Property(property="subcategories", type="array", @OA\Items())
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product == null)
            return response()->json(['error' => 'Producto no encontrado'], 404);

        $subcategories = Subcategory::all();

        return response()->json([
            'product' => $product,
            'category' => $product->subcategory->category,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}/disable",
     *     summary="Deshabilita el producto mediante el stock",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Product ID",
     *         
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Image edited successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function editImage(string $id)
    {
        $product = Product::find($id);
        if ($product == null)
            return response()->json(['error' => 'Producto no encontrado'], 404);

        if ($product->hasStock)
            if ($product->hasStock)
                $product->hasStock = false;
        $product->save();

        return response()->json([
            'message' => 'Image edited successfully'
        ], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     summary="Actualiza el producto identificado por el ID",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *          @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(property="name", type="string", maxLength=255),
     *                 @OA\Property(property="price", type="integer", minimum=1),
     *                 @OA\Property(property="subcategory", type="integer"),
     *                 @OA\Property(property="image", type="string", format="binary")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error or error storing image",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string")
     *         )
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if ($product == null)
            if ($product == null)
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
                        
            if ($product->image_path != null) {
                Cloudinary::destroy($product->image_path);
                if ($product->image_path != null) {
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
            ], 200);
        }
        return response()->json(['message' => 'Ocurrió un error al almacenar la imagen.'], 500);
    }
}
