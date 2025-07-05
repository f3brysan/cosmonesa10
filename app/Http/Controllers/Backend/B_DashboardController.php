<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kiosks;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class B_DashboardController extends Controller
{
    public function index()
    {
        // Load the dashboard view
        // Get the user role
        $role = auth()->user()->getRoleNames();

        // Switch to the correct role dashboard
        foreach ($role as $key => $value) {
            switch ($value) {
                case 'superadmin':
                    // Load the superadmin dashboard
                    return $this->admin_dashboard();
                case 'pengelola':
                    // Load the pengelola dashboard
                    return $this->pengelola_dashboard();
                case 'seller':
                    // Load the seller dashboard
                    return $this->seller_dashboard();
            }
        }
    }

    public function admin_dashboard()
    {
        $monthNow = date('Y-m');
        $profit = Transaction::whereIn('payment_status', ['paid', 'success'])
            ->sum('total');
        $profitMonth = Transaction::where('created_at', 'like', $monthNow.'%')
            ->whereIn('payment_status', ['paid', 'success'])
            ->sum('total');

        $kiosks = Kiosks::all();

        $productSold = DB::table('transaction_details')
            ->select('transaction_details.*')
            ->join('transactions', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->where('transactions.type', '=', 'product')
            ->whereIn('transactions.payment_status', ['success', 'paid']);

        return view('back.dashboard.index', compact('profitMonth', 'profit', 'kiosks', 'productSold'));
    }

    public function seller_dashboard()
    {
        $kiosks = Kiosks::where('user_id', auth()->user()->id)->first();
        $getTransactionSuccess = DB::table('services as s')
            ->select('s.*', 't.payment_status', 't.total')
            ->join('transaction_details as td', 'td.reference_id', '=', 's.id')
            ->join('transactions as t', 't.id', '=', 'td.transaction_id')
            ->where('s.kiosk_id', $kiosks->id)
            ->whereIn('t.payment_status', ['success', 'paid'])
            ->get();
        

        return view('back.dashboard.index-seller', compact('kiosks', 'getTransactionSuccess'));
    }

}
