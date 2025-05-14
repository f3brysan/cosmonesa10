<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KioskActiveDay;

class B_KioskController extends Controller
{
    public function kioskDetail()
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();      

        return [
            'kiosk' => $kiosk,           
        ];
    }
    /**
     * Update the kiosk about information
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutUpdate(Request $request)
    {
        try {
            // Get the kiosk details
            $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();

            // Check if the kiosk name is already exist
            if ($kiosk->name != $request->name) {
                // Validate the request
                $validated = $request->validate([
                    'name' => 'required|unique:kiosks|max:255',
                ]);
            }

            // Begin a transaction
            DB::beginTransaction();

            // Update the kiosk details
            $kioskUpdate = Kiosks::where('user_id', auth()->user()->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'description' => $request->description,
                'address' => $request->address,
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            // Rollback the transaction
            DB::rollBack();
            // Redirect back with error message
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function sellerService()
    {
        $kiosk = $this->kioskDetail()['kiosk'];       
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
