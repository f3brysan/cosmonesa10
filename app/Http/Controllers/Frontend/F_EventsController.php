<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class F_EventsController extends Controller
{
    //
    public function index()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.events.index');
    }
    public function detail()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.events.detail');
    }
    public function join()
    {
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.events.presents');
    }
}
