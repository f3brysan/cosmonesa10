<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceCategories;
use App\Http\Controllers\Controller;

class F_ServicesController
{
    //

    public function index($slug)
    {
        $serviceCategory = ServiceCategories::where('slug', $slug)->first();
        $services = Services::with('kiosk')->where('category_id', $serviceCategory->id)->get();
        return view('front.page.services.index', compact('services', 'serviceCategory'));
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
    /**
     * Display a listing of the service categories with logos.
     *
     * This function retrieves all service categories ordered by name and prepares
     * a list of logos for display in the view.
     *
     * @return \Illuminate\View\View The view displaying service categories.
     */
    public function categories()
    {
        // List of available logos for service categories
        $logos = ['mkov-facial', 'mkov-cup', 'mkov-hand', 'mkov-leaf'];
        
        // Retrieve all service categories ordered by name
        $serviceCategories = ServiceCategories::orderBy('name')->get();
        
        // Return the view with service categories and logos
        return view('front.page.services.categories', compact('serviceCategories', 'logos'));
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
