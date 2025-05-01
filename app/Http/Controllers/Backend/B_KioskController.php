<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class B_KioskController extends Controller
{
    public function sellerService() 
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();
        $services = Services::with('category')->where('kiosk_id', $kiosk->id)->get();
        $user = User::find(auth()->user()->id);
        $active = 'service';

        return view('back.kiosk.seller.service', compact('kiosk', 'user', 'services', 'active'));        
    }

    public function serviceHistory() 
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();
        $services = Services::with('category')->where('kiosk_id', $kiosk->id)->get();
        $user = User::find(auth()->user()->id);
        $active = 'service';
}
