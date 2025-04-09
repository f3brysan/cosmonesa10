<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class F_WorkshopController extends Controller
{
    //
    public function index()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.workshop.index');
    }
}
