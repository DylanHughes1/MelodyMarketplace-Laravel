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
     *     path="/rest/products",
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

        $products = Product::orderBy('id', 'asc')->paginate(15);
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
     *     path="/rest/products/{id}",
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

}
