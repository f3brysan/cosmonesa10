<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceBooking;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class F_BookingController extends Controller
{
    public function service_booking($service_id, $date, $slot_id)
    {
        $serviceBookingExists = ServiceBooking::where('service_id', $service_id)
            ->where('date', $date)
            ->where('slot_id', $slot_id)
            ->exists();
        
        if ($serviceBookingExists) {
            return redirect()->back()->with('error', 'Service booking already exists for the selected date and slot.');
        }

        $service = Services::find($service_id);

        try {
            DB::beginTransaction();
            $insertBooking = ServiceBooking::create([
            'customer_id' => auth()->user()->id,
            'service_id' => $service_id,
            'date' => $date,
            'slot_id' => $slot_id,            
        ]);
        $transaction = new F_TransactionController();
        $createTransaction = $transaction->createTransaction('service', $service_id);

        DB::commit();
        dd($createTransaction);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
        

        return redirect('checkout')->with('success', 'Service booking created successfully.');
    }
}
