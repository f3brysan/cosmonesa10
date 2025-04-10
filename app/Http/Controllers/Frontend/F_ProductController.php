<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class F_ProductController extends Controller
{
    public function index()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.product.index');
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
