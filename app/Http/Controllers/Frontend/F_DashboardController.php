<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class F_DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve data from the database
        // $users = User::all();

        // Return the view

        return view('front.page.dashboard.index');
    }
}
