<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class APICategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return response()->json(['categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::select('id', 'name', 'image_link')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json($categories);
    }

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