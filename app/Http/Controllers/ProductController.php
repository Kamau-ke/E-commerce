<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with(['category', 'images'])
                            ->orderBy('created_at','desc')
                            ->get();
                        

        return view('admin.products', compact('products'));
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
    public function store(ProductRequest $request)
    {
        //
       
       $products=Product::create(array_merge($request->validated(),[
            'user_id'=>Auth::id()
        ]));

        if($request->hasFile('images')){
            foreach($request->file('images') as $position=> $image){
                $path=$image->store('products', 'public');
                $products->images()->create([
                    'image_path'=> $path,
                    'position'=> $position

                ]);

            }
        }

        return response()->json([
        'status'=>'success',    
        'message'=>'product created successfully']
        , 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        $product->load('category');
        return view('productPage', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
