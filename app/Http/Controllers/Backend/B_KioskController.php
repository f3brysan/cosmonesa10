<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class B_KioskController extends Controller
{

    public function aboutUpdate(Request $request)
    {        
        try {

            $validated = $request->validate([
                'name' => 'required|unique:kiosks|max:255',                
            ]);

            $kiosk = Kiosks::where('user_id', auth()->user()->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
                'address' => $request->address,            
            ]);

            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
        
        
    }
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
}
