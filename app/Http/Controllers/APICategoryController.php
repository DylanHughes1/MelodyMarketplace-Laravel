<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use OpenApi\Annotations as OA;

class APICategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/rest/categories",
     *     summary="Obtiene todas las categorias.",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response="200",
     *         description="All categories obtained.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="Category ID."
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Category name."
     *                 ),
     *                 @OA\Property(
     *                     property="image_link",
     *                     type="string",
     *                     description="Link to the category image."
     *                 ),
     *                 @OA\Property(
     *                     property="image_path",
     *                     type="string",
     *                     description="Category image path in Cloudinary."
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="date",
     *                     description="Date when the category was created."
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="date",
     *                     description="Date when the category was updated."
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Categories not found.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 description="Error message."
     *             ),
     *         )
     *     ),
     * )
     */

    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return response()->json(['categories' => $categories]);
    }

    /**
     * @OA\Get(
     *     path="/rest/categories/{id}",
     *     summary="Obtener una categoría por su ID",
     *     description="You get a category specified by your ID.",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Category ID to get",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="id"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Category obtained correctly.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="Category ID."
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Category name."
     *             ),
     *             @OA\Property(
     *                 property="image_link",
     *                 type="string",
     *                 description="Link to the category image."
     *             ),
     *             @OA\Property(
     *                 property="image_path",
     *                 type="string",
     *                 description="Category image path in Cloudinary."
     *             ),
     *             @OA\Property(
     *                 property="created_at",
     *                 type="date",
     *                 description="Date when the category was created."
     *             ),
     *             @OA\Property(
     *                 property="updated_at",
     *                 type="date",
     *                 description="Date when the category was updated."
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="The category does not exist.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 description="Error message stating that the category does not exist."
     *             )
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'La categoría no existe'], 404);
        }

        return response()->json($category);
    }

}
