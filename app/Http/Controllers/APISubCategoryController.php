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
            ->get();
        return response()->json($subcategories);
    }

    /**
     * @OA\Post(
     *     path="/rest/subcategories",
     *     summary="Crear una nueva subcategoría",
     *     tags={"Subcategories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                     @OA\Property(
     *                      property="name",
     *                      description="Subcategory name",
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
     *         description="Subcategory created correctly",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="La subcategoría se creó con éxito."
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
            $uploadedFile = $image->storeOnCloudinary('/subcategories');
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al almacenar la imagen.'
            ], 500);
        }

        $subcategory = new Subcategory();
        $subcategory->name = $request->get('name');
        $subcategory->image_link = $uploadedFile->getPath();
        $subcategory->image_path = $uploadedFile->getPublicId();

        $subcategory->save();

        return response()->json([
            'message' => 'Subcategoría creada exitosamente.',
            'subcategory' => $subcategory
        ], 201);
    }


    public function edit($id)
    {
    }

    /**
     * @OA\Put(
     *     path="/rest/subcategories/{id}",
     *     summary="Actualiza una subcategoría existente.",
     *     tags={"Subcategories"},
     *     @OA\Parameter(
     *         name="id",
     *         description="Subcategory ID to update.",
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
     *                 example="Nombre de la subcategoría"
     *             )
     *         )
     *  
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Subcategory updated correctly.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Subcategoría actualizada correctamente."),
     *             @OA\Property(property="subcategory", type="string")
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
     *         description="The specified subcategory does not exist.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message",type="string", example="La subcategoría especificada no existe.")
     *         )
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Server error when upgrading the subcategory.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Ocurrió un error al actualizar la subcategoría.")
     *         )
     *     ),
     *     security={
     *         {"bearerAuth": {}}
     *     }
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);

        $subcategory = Subcategory::find($id);

        if (!$subcategory) {
            return response()->json([
                'message' => 'Subcategory not found'
            ], 404);
        }

        $subcategory->name = $request->input('name');

        if ($request->has('image')) {
            $image = $request->file('image');

            if ($subcategory->image_path != null) {
                Cloudinary::destroy($subcategory->image_path);
            }

            try {
                $uploadedFile = $image->storeOnCloudinary('subcategories');
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Error storing the image'
                ], 500);
            }

            $subcategory->image_link = $uploadedFile->getSecurePath();
            $subcategory->image_path = $uploadedFile->getPublicId();
        }

        $subcategory->save();

        return response()->json([
            'message' => 'Subcategory updated successfully',
            'subcategory' => $subcategory
        ], 200);
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


    public function destroy($id)
    {
    }
}
