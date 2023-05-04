<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class APISubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::select('id', 'name', 'image_link')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json($subcategories);
    }



    public function create()
    {
        $subcategories = Subcategory::select('id', 'name', 'image_link')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json(['subcategories' => $subcategories]);
    }

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
