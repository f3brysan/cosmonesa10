<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class B_ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('productimages')->get();

        return $products;
    }
}
