<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class F_DashboardController extends Controller
{
    public function index()
    {
        dd('wkwk');
        // $users = User::all(); // Example: Retrieve data from the database
        return view('front.page.dashboard.index');
    }
}
