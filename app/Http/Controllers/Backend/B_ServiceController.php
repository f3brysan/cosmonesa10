<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceCategories;
use App\Http\Controllers\Controller;

class B_ServiceController extends Controller
{        
    public function create()
    {
        // Get all service categories sorted by name
        $categories = ServiceCategories::orderBy('name')->get();

        // Pass the categories to the view
        return view('back.kiosk.seller.service.create', compact('categories'));
    }
}
