<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceCategories;
use App\Http\Controllers\Controller;
use App\Models\ServiceSlot;
use Illuminate\Support\Facades\Crypt;

class F_ServicesController
{
    //

    public function index($slug)
    {
        $serviceCategory = ServiceCategories::where('slug', $slug)->first();
        $services = Services::with('kiosk')->where('category_id', $serviceCategory->id)->get();
        return view('front.page.services.index', compact('services', 'serviceCategory'));
    }
    public function view($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Throwable $th) {
            abort(404);
        }

        $service = Services::with('kiosk')->where('id', $id)->first();
        $slots = ServiceSlot::where('service_id', $service->id)->get();  
        $filterDays = $slots->pluck('day')->unique()->toArray();   
        $slotDays = $this->slotDays($filterDays);        
        
        return view('front.page.services.view', compact('service', 'slotDays', 'slots'));
    }

    /**
     * Retrieves the days of the week that the service is available for the next 30 days.
     *
     * @param int $service_id The ID of the service to retrieve the available days for.
     * @return array An array of associative arrays containing the day and date of the week.
     */
    public function slotDays($filterDays)
    {                    
        $slotDays = [];

        // Loop through the next 30 days
        for ($i=0; $i < 30; $i++) { 
            $currentDate = date('Y-m-d');
            $currentDate = date('Y-m-d', strtotime($currentDate . ' + ' . $i . ' days'));
            
            // Get the day of the week in lowercase
            $currentDay = strtolower(date('l', strtotime($currentDate)));
            
            // Check if the day of the week is in the available days array
            if (in_array($currentDay, $filterDays)) {                
                // Add the day and date to the result array
                $slotDays[] = [
                    'day' => $currentDay,
                    'date' => $currentDate
                ];
            }
        }         

        return $slotDays;
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
