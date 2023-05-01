<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
{
    $categories = Category::all();
    return view('categories.index')
    ->with('categories',$categories);
}

/**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $categories = Category::all();

        return view('categories.show')
            ->with('categories',$categories);
    }
}
