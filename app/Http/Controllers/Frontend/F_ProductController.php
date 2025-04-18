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
    public function product()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.product.single');
    }
    public function cart()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.product.cart');
    }
    public function checkout()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.product.checkout');
    }
}
