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
    public function index()
    {
        $kiosks = Kiosks::with('user')->get();


    }
    public function kioskDetail()
    {
        $kiosk = Kiosks::where('user_id', auth()->user()->id)->first();

        return [
            'kiosk' => $kiosk,
        ];
    }

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
        $transactionHistories = DB::table('services as s')
            ->select('t.*', 'u.name', 'sb.date as booking_date')
            ->join('transaction_details as td', 'td.reference_id', '=', 's.id')
            ->join('transactions as t', 't.id', '=', 'td.transaction_id')
            ->join('users as u', 'u.id', '=', 't.customer_id')
            ->join('service_bookings as sb', 'sb.transaction_id', '=', 't.id')
            ->where('s.kiosk_id', $kiosk->id)
            ->whereIn('t.payment_status', ['success', 'paid'])
            ->orderByDesc('t.created_at')
            ->get();
        $active = 'history-service';
        return view('back.kiosk.seller.service-history', compact('kiosk', 'transactionHistories', 'active'));
    }
}
