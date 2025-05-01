<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kiosks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class B_KioskController extends Controller
{
    public function myKiosk() 
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();
        $user = User::find(auth()->user()->id);
        return view('back.kiosk.seller.index', compact('kiosk', 'user'));        
    }
}
