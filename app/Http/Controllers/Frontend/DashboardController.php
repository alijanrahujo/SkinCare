<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $products = Product::with('category')->orderby('id', 'desc')->get();

        $letestProducts = Product::orderby('id', 'desc')->limit(6)->get();
        $topRatedProducts = Product::inRandomOrder()->limit(6)->get();
        $reviewProducts = Product::inRandomOrder()->limit(6)->get();

        return view('frontend.index', compact('products', 'categories', 'letestProducts', 'topRatedProducts', 'reviewProducts'));
    }

    public function singleProduct($id)
    {
        $product = Product::with('category')->where('id', $id)->first();

        $relatedProducts = $product->category->products;

        return view('frontend.singleProduct', compact('product', 'relatedProducts'));
    }
}
