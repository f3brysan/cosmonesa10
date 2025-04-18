<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class F_EventsController extends Controller
{
    
    public function index()
    {
        // Retrieve the list of events
        // The with() method is used to eager load the related eventtype
        $events = Events::with('eventtype')
            // Sort the events by event_date in ascending order
            ->orderBy('event_date')
            // Filter the events to only include the ones that are in the future
            ->where('event_date', '>=', date('Y-m-d'))
            ->get();

        // Retrieve the list of last events
        // The with() method is used to eager load the related eventtype
        $lastEvents = Events::with('eventtype')
            // Sort the events by event_date in descending order
            ->orderBy('event_date', 'desc')
            // Filter the events to only include the ones that are in the past
            ->where('event_date', '<', date('Y-m-d'))
            ->get();

        // Return the view with the events and last events
        return view('front.page.events.index', compact('events', 'lastEvents'));
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
