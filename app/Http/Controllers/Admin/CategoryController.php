<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index(){
        return view("admin.categories");
    }

    public function store(Request $request){
        $validated= $request->validate([
            "name"=> "min:3|required",
        ]);
        Category::create($validated);
        
        return response()->json([
            "status"=> "success",
            "message"=> "Category created successfully"
        ], 201);

    }

    // public function showCategories(){
    //     $categories=Category::
    // }
}
