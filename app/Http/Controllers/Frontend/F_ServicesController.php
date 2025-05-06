<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\ServiceCategories;
use App\Http\Controllers\Controller;

class F_ServicesController
{
    //

    public function index()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.services.index');
    }
    public function view()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.services.view');
    }
    public function schedule()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.services.schedule');
    }
    public function categories()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.services.categories');
    }
    public function getServiceCat()

    {
        // $users = User::all(); // Example: Retrieve data from the database
        $categories = ServiceCategories::withCount('service')->get();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil',
            'data' => $categories
        ]);
    }
}
