<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class B_DashboardController extends Controller
{        
    public function index()
    {
        // Load the dashboard view
        // Get the user role
        $role = auth()->user()->getRoleNames();
        
        // Switch to the correct role dashboard
        foreach ($role as $key => $value) {
            switch ($value) {
                case 'superadmin':
                    // Load the superadmin dashboard
                    return $this->admin_dashboard();                    
                case 'pengelola':
                    // Load the pengelola dashboard
                    return $this->pengelola_dashboard();                    
                case 'seller':
                    // Load the seller dashboard
                    return $this->seller_dashboard();                    
            }
        }        
    }

    public function admin_dashboard() 
    {
        return view('back.dashboard.index');
    }


}
