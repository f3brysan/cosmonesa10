<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class B_DashboardController extends Controller
{
    public function index(){
        dd(auth()->user());
        return view('back.dashboard.index');
    }
}
