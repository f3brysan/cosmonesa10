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
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $activeDays = KioskActiveDay::where('kiosk_id', $kiosk->id)->get()->keyBy('day');

        return [
            'kiosk' => $kiosk,
            'days' => $days,
            'activeDays' => $activeDays
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

            // Save the active days
            if (count($request->days) > 0) {
                // First delete all the active days of the kiosk
                $resetActiveDays = KioskActiveDay::where('kiosk_id', $kiosk->id)->delete();

                // Loop through the days and save it
                foreach ($request->days as $key => $value) {
                    // Check if the day already exist
                    $insertDays = KioskActiveDay::create(
                        [
                            'kiosk_id' => $kiosk->id,
                            'day' => $value,
                        ]
                    );
                }
            }

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
        $days = $this->kioskDetail()['days'];
        $activeDays = $this->kioskDetail()['activeDays'];
        $services = Services::with('category')->where('kiosk_id', $kiosk->id)->get();
        $user = User::find(auth()->user()->id);
        $active = 'service';

        return view('back.kiosk.seller.service', compact('kiosk', 'user', 'services', 'active', 'days', 'activeDays'));
    }

    public function serviceHistory()
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();
        $services = Services::with('category')->where('kiosk_id', $kiosk->id)->get();
        $user = User::find(auth()->user()->id);
        $active = 'service';
    }
}
