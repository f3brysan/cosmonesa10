<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
}
