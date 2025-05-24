<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\ServiceBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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

        $transaction_id = $createTransaction['transaction_id'];
        $transaction_id_crypt = Crypt::encrypt($transaction_id->__tostring());

        return redirect(URL::to('checkout/' . $transaction_id_crypt))->with('success', 'Service booking created successfully. Please complete the payment.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }            
    }
}
