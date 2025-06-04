<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CartItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
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
                // Validate the request
                $validated = $request->validate([
                        'transaction_id' => 'required',
                        'bukti' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);

                // Decrypt the transaction id
                $transaction_id = Crypt::decrypt($validated['transaction_id']);

                // Check if the transaction exists
                $checkTransaction = Transaction::find($transaction_id);

                // If the transaction exists and the type is product
                if ($checkTransaction && $checkTransaction->type == 'product') {
                        // Get the transaction detail
                        $transactionDetail = TransactionDetail::where('transaction_id', $transaction_id)->get();

                        // Update the cart items
                        foreach ($transactionDetail as $key => $value) {
                                $deleteCartItems = CartItem::where('product_id', $value->reference_id)
                                        ->where('customer_id', auth()->user()->id)
                                        ->where('is_paid', 0)
                                        ->update([
                                                'is_paid' => 1
                                        ]);
                        }
                }

                // Get the code from the request
                $code = Crypt::decrypt($request->code);

                // Get the bukti file from the request
                $bukti = $request->file('bukti');

                // Generate a filename for the bukti file
                $filename = 'Bukti bayar_' . date('YmdHis') . '_' . $code . '.' . $bukti->getClientOriginalExtension();

                // Store the bukti file
                $path = $bukti->storeAs('bukti_bayar', $filename, 'public');

                // Update the transaction
                $update = $checkTransaction->update([
                        'payment_status' => 'paid',
                        'payment_file' => $path
                ]);

                // If the update is successful
                if ($update) {
                        // Get the transaction
                        $transaction = Transaction::with('transaction_detail')->find($transaction_id);

                        // Return the view
                        return view('front.page.payment.index', compact('transaction'));
                }
        }
}
