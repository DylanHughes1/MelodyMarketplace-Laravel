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
     * @OA\Post(
     *     path="/rest/categories",
     *     summary="Crear una nueva categoría",
     *     tags={"Categories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                     @OA\Property(
     *                      property="name",
     *                      description="Category name",
     *                      type="string"
     *                 ),
     *                     @OA\Property(
     *                      property="image",
     *                      description="Image to upload",
     *                      type="string",
     *                      format="binary"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Category created correctly",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="La categoría se creó con éxito."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Los datos proporcionados no son válidos."
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={
     *                     "name": {
     *                         "El campo nombre es obligatorio."
     *                     },
     *                     "image": {
     *                         "El campo imagen es obligatorio.",
     *                         "El campo imagen debe ser una imagen.",
     *                         "El campo imagen no debe ser mayor de 1000 kilobytes."
     *                     }
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Ocurrió un error al almacenar la imagen."
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|max:1000'
        ]);

        try {
            $image = $request->file('image');
            $uploadedFile = $image->storeOnCloudinary('/categories');
        } catch (Exception $e) {
            return response()->json(['message' => 'Ocurrió un error al almacenar la imagen.'], 500);
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->image_link = $uploadedFile->getPath();
        $category->image_path = $uploadedFile->getPublicId();

        $category->save();

        return response()->json(['message' => 'La categoría se creó con éxito.'], 201);
    }


    public function edit($id)
    {
    }

    /**
     * @OA\Put(
     *     path="/rest/categories/{id}",
     *     summary="Actualiza una categoría existente.",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="id",
     *         description="Category ID to update.",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer",
     *             format="int64",
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 example="Nombre de la categoría"
     *             )
     *         )
     *  
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Category updated correctly.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Categoría actualizada correctamente."),
     *             @OA\Property(property="category", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Malformed or missing fields required.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="La solicitud es inválida.")
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="The specified category does not exist.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message",type="string", example="La categoría especificada no existe.")
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Server error when upgrading the category.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Ocurrió un error al actualizar la categoría.")
     *         )
     *     ) 
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);

        $category = Category::find($id);

        $category->name = $request->input('name');

        if ($request->has('image')) {

            try {
                $image = $request->file('image');
                if ($category->image_path != null) {
                    Cloudinary::destroy($category->image_path);
                }

                $uploadedFile = $image->storeOnCloudinary('categories');
                $category->image_link = $uploadedFile->getSecurePath();
                $category->image_path = $uploadedFile->getPublicId();
            } catch (Exception $e) {
                return response()->json(['message' => 'Ocurrió un error al almacenar la imagen.'], 500);
            }
        }
        $category->save();

        return response()->json(['message' => 'Categoría actualizada correctamente.', 'category' => $category], 200);
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

    public function destroy($id)
    {
    }
}
