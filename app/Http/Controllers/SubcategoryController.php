<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Exception;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::select('id', 'name', 'image_link')
                ->orderBy('id', 'asc')
                ->get();
        return view('subcategories.index')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories = Subcategory::select('id', 'name', 'image_link')
                ->orderBy('id', 'asc')
                ->get();
        $categories = Category::all();
        return view('subcategories.create')
            ->with('subcategories',$subcategories)
            ->with('categories',$categories);
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
            $uploadedFile = $image->storeOnCloudinary('/subcategories');
        }catch (Exception $e){
            return redirect("/subcategories")->withErrors("Ocurrió un error al almacenar la imagen.\n");
        }

        $subcategory = new Subcategory();
        $subcategory->name = $request->get('name');
        $subcategory->category_id = $request->get('category');
        $subcategory->image_link = $uploadedFile->getPath();
        $subcategory->image_path = $uploadedFile->getPublicId();

        $subcategory->save();

        return redirect("/subcategories");
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

        $subcategory->name = $request->input('name');

            if($request->has('image')){

                $image = $request->file('image');
                if($subcategory->image_path != null){
                            Cloudinary::destroy($subcategory->image_path);  
                }

                $uploadedFile = $image->storeOnCloudinary('subcategories');
                $subcategory->image_link = $uploadedFile->getSecurePath();
                $subcategory->image_path = $uploadedFile->getPublicId();
            }
            $subcategory->save();
        
        
        return redirect("/subcategories/".$subcategory->id);
    }

    public function show(string $id)
    {
        $subcategory = Subcategory::find($id);

        return view('subcategories.show')
            ->with('subcategories', $subcategory);
    }

    public function destroy($id)
    {
    
    }
}
