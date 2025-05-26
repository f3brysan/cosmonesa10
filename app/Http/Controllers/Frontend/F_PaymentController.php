<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class F_PaymentController extends Controller
{
        public function index($transaction_id)
        {
                $transaction_id = Crypt::decrypt($transaction_id);
                $transaction = Transaction::with('transaction_detail')->find($transaction_id);

                return view('front.page.payment.index', compact('transaction'));
        }

        public function storePayment(Request $request)
        {
                $validated = $request->validate([
                        'transaction_id' => 'required',
                        'bukti' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);

                $code = Crypt::decrypt($request->code);
                $bukti = $request->file('bukti');
                $filename = 'Bukti bayar_' . date('YmdHis') . '_' . $code . '.' . $bukti->getClientOriginalExtension();                                
                $path = $bukti->storeAs('bukti_bayar', $filename, 'public');

                $transaction_id = Crypt::decrypt($validated['transaction_id']);
                $update = Transaction::where('id', $transaction_id)->update([
                        'payment_status' => 'paid',
                        'payment_file' => $path
                ]);

                if ($update) {
                        $transaction = Transaction::with('transaction_detail')->find($transaction_id);
                        return view('front.page.payment.index', compact('transaction'));
                }
                
        }
}
