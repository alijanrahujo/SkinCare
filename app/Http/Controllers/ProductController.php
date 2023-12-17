<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'mrp' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Store thumbnail
        $thumbnail = $request->file('thumbnail')->store('public/uploads/products');
        $thumbnailFileName = basename($thumbnail);

        // Store images
        $images = [];
        foreach ($request->file('images') as $file) {
            $imagePath = $file->store('public/uploads/products');
            // $images[] = $imagePath;
            $images[] = basename($imagePath);
        }

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->thumbnail = $thumbnailFileName;
        $product->images = json_encode($images);
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->save();

        return redirect('admin/product')->with('success', 'Product successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::pluck('title', 'id');
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'mrp' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Store thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('public/uploads/products');
            $thumbnailFileName = basename($thumbnail);
            $product->thumbnail = $thumbnailFileName;
        }

        // Store images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $imagePath = $file->store('public/uploads/products');
                // $images[] = $imagePath;
                $images[] = basename($imagePath);
            }
            $product->images = json_encode($images);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->update();

        return redirect('admin/product')->with('success', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/product')->with('success', 'Product successfully delete!');
    }
}
