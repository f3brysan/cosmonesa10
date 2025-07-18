<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kiosks;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\KioskActiveDay;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class B_KioskController extends Controller
{
    public function index(Request $request)
    {
        $kiosks = Kiosks::with('user', 'services')->get();

        try {
            if ($request->ajax()) {
                return DataTables::of($kiosks)
                    ->addIndexColumn()
                    ->addColumn('user', function ($item) {
                        return $item->user->name;
                    })
                    ->addColumn('countServices', function ($item) {
                        return $item->services->count();
                    })
                    ->addColumn('action', function ($item) {
                        if ($item->is_verified == 0) {
                            $btn = '<a href="javascript:void(0)" data-id="'.Crypt::encrypt($item->id).'" class="btn btn-primary approve" data-value="'.$item->is_verified.'" title="Approve"><i class="icon-base bx bx-check"></i></a>';
                        } else {
                            $btn = '<a href="javascript:void(0)" data-id="'.Crypt::encrypt($item->id).'" class="btn btn-warning approve" data-value="'.$item->is_verified.'" title="Disapprove"><i class="icon-base bx bx-x"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['user', 'countServices', 'action'])
                    ->make(true);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
        return view('back.seller_list.index');
    }

    public function approve(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->id);

            $kiosk = Kiosks::find($id);
            
            if ($kiosk->is_verified == 0) {
                $kiosk->update([
                    'is_verified' => 1,
                ]);
            } else {
                $kiosk->update([
                    'is_verified' => 0,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Kiosks updated successfully'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()], 500);
        }
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
