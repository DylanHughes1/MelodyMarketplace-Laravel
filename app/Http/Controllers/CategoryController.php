<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'image_link')
                ->orderBy('id', 'asc')
                ->get();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name', 'image_link')
                ->orderBy('id', 'asc')
                ->get();
        return view('categories.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|max:1000'
        ]);

        try{
            $image = $request->file('image');
            $uploadedFile = $image->storeOnCloudinary('/categories');
        }catch (Exception $e){
            return redirect("/categories")->withErrors("Ocurrió un error al almacenar la imagen.\n");
        }

        $category = new Category();
        $category->name = $request->get('name');
        $category->image_link = $uploadedFile->getPath();
        $category->image_path = $uploadedFile->getPublicId();

        $category->save();

        return redirect("/categories");
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

            if($request->has('image')){

                $image = $request->file('image');
                if($category->image_path != null){
                            Cloudinary::destroy($category->image_path);  
                }

                $uploadedFile = $image->storeOnCloudinary('categories');
                $category->image_link = $uploadedFile->getSecurePath();
                $category->image_path = $uploadedFile->getPublicId();
            }
            $category->save();
        
        
        return redirect("/categories/".$category->id);
    }

    public function show(string $id)
    {
        $category = Category::find($id);

        return view('categories.show')
            ->with('categories', $category);
    }

    public function destroy($id)
    {
    
    }
}
