<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Support\Facades\Crypt;

class B_TransactionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $transactions = Transaction::with('transaction_detail', 'user')->get();
            
             if ($request->ajax()) {
                return DataTables::of($transactions)
                    ->addIndexColumn()    
                    ->editColumn('created_at', function ($item) {
                        return date('Y-m-d', strtotime($item->created_at));
                    })                               
                    ->editColumn('payment_status', function ($item) {
                        $result = '';
                        if ($item->payment_status == 'unpaid') {
                            $result = '<span class="badge bg-label-warning me-1">Unpaid</span>';
                        } elseif ($item->payment_status == 'success') {
                            $result = '<span class="badge bg-label-success me-1">Success</span>';
                        } elseif ($item->payment_status == 'failed') {
                            $result = '<span class="badge bg-label-danger me-1">Failed</span>';
                        } elseif ($item->payment_status == 'paid') {
                            $result = '<span class="badge bg-label-primary me-1">Paid</span>';
                            $result .= '<br>';
                            $result .= '<a class="btn btn-sm btn-primary m-2" href="' . URL::asset('storage/' . $item->payment_file) . '" target="_blank">Bukti Bayar</a>';
                        }
                        return $result;
                    })
                    ->addColumn('description', function ($item) {
                        $result = '';
                        $result .= $item->note;
                        $result .= '<br>';
                        $result .= '<ul>';
                        if ($item->type == 'product') {                                
                                foreach ($item->transaction_detail as $key => $value) {
                                    $result .= '<li>';
                                    $result .= $value->description;
                                    $result .= ' (' . $value->qty . 'x '. 'Rp ' . number_format($value->price, 0, ',', '.') . ')</li>';
                                }
                                $result .= '<li>Ongkir (Rp ' . number_format($item->shipping, 0, ',', '.') . ')</li>';
                            }
                        $result .= '</ul>';
                        return $result;
                    })
                    ->addColumn('name', function ($item) {
                        $result = !empty($item->user->name) ? $item->user->name : '';
                        return $result;
                    })
                    ->addColumn('price', function ($item) {
                        $total = (int) (!empty($item->total)) ? $item->total : 0;
                        $shipping = (int) (!empty($item->shipping)) ? $item->shipping : 0;

                        $result = 'Rp&nbsp;' . number_format($total + $shipping, 0, ',', '.');
                        return $result;
                    })                  
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '';
                        if ($item->payment_status == 'paid') {                            
                            $btn = '<a class="btn btn-sm btn-info approve" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0)"><i class="icon-base fa fa-check"></i> Approve</a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action', 'payment_status', 'price', 'name', 'description'])
                    ->addIndexColumn()
                    ->make(true);
            }

            return view('back.transaction.index');
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function approve(Request $request) 
    {
        try {            
            $id = Crypt::decrypt($request->id);
            $transaction = Transaction::find($id);

            if ($transaction->type == 'product') {
                $transactionDetail = TransactionDetail::where('transaction_id', $transaction->id)->get();
                foreach ($transactionDetail as $key => $value) {
                    $getProduct = Products::find($value->reference_id);
                    $getProduct->stock = $getProduct->stock - $value->qty;
                    $getProduct->save();
                }                
            }

            $transaction->payment_status = 'success';
            $transaction->updated_by = auth()->user()->id;
            $transaction->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
