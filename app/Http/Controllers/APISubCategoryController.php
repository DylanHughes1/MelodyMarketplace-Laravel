<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use OpenApi\Annotations as OA;

class APISubCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/rest/subcategories",
     *     summary="Obtiene todas las subcategorias.",
     *     tags={"Subcategories"},
     *     @OA\Response(
     *         response="200",
     *         description="All subcategories obtained.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     description="Subcategory ID."
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Subcategory name."
     *                 ),
     *                 @OA\Property(
     *                     property="image_link",
     *                     type="string",
     *                     description="Link to the subcategory image."
     *                 ),
     *                 @OA\Property(
     *                     property="image_path",
     *                     type="string",
     *                     description="Subcategory image path in Cloudinary."
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="date",
     *                     description="Date when the subcategory was created."
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="date",
     *                     description="Date when the subcategory was updated."
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Subcategories not found.",
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
        $subcategories = Subcategory::select('id', 'name', 'image_link')
            ->orderBy('id', 'asc')
            ->paginte(10);
        return response()->json($subcategories);
    }

    /**
     * @OA\Get(
     *     path="/rest/subcategories/{id}",
     *     summary="Obtener una subcategoria por su ID",
     *     description="You get a subcategory specified by your ID.",
     *     tags={"Subcategories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Subcategory ID to get",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="id"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Subcategory obtained correctly.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="Subcategory ID."
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="Subcategory name."
     *             ),
     *             @OA\Property(
     *                 property="image_link",
     *                 type="string",
     *                 description="Link to the Subcategory image."
     *             ),
     *             @OA\Property(
     *                 property="image_path",
     *                 type="string",
     *                 description="Subcategory image path in Cloudinary."
     *             ),
     *             @OA\Property(
     *                 property="created_at",
     *                 type="date",
     *                 description="Date when the subcategory was created."
     *             ),
     *             @OA\Property(
     *                 property="updated_at",
     *                 type="date",
     *                 description="Date when the subcategory was updated."
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="The subcategory does not exist.",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 description="Error message stating that the subcategory does not exist."
     *             )
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $subcategory = Subcategory::find($id);

        if ($subcategory) {
            return response()->json([
                'id' => $subcategory->id,
                'name' => $subcategory->name,
                'image_link' => $subcategory->image_link,
            ]);
        } else {
            return response()->json([
                'message' => 'Subcategory not found',
            ], 404);
        }
    }

}
