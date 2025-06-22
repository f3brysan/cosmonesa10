<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Http\Controllers\Controller;

class F_ProductController extends Controller
{
    public function index()
    {
        $products = Products::with(['category'])->inRandomOrder()->get();
        $productImage = ProductImages::where('is_cover', '1')->get()->keyBy('product_id');
        return view('front.page.product.index', compact('products', 'productImage'));
    }
    public function get_products()
    {
        $products = Products::with(['category'])->inRandomOrder()->get();
        return response()->json([
            'status' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }

    public function product($slug)
    {
        // Retrieve the product with its category
        $product = Products::with(['category'])->where('slug', $slug)->first();

        // Retrieve all images for the product
        $productImages = ProductImages::where('product_id', $product->id)->get();

        // Another related products
        $relatedProducts = Products::with(['category'])->where('category_id', $product->category_id)->where('id', '!=', $product->id)->inRandomOrder()->limit(10)->get();

        // Return the view with the product and its images
        return view('front.page.product.single', compact('product', 'productImages', 'relatedProducts'));
    }
    public function checkout()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.product.checkout');
    }
}
