<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class B_DashboardController extends Controller
{    
    public function index()
    {
        // Load the dashboard view
        return view('back.dashboard.index');
    }
}
