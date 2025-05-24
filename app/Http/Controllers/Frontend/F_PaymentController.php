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
}
