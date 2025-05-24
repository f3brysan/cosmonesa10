<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Events;
use App\Models\Services;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class F_TransactionController extends Controller
{
    public function autocode($type)
    {
        
        switch ($type) {
            case 'service':
                $typecode = "SRV";
                break;

            case 'product':
                $typecode = "PRD";
                break;

            case 'event':
                $typecode = "EVT";
                break;

            default:
                $typecode = "INV";
                break;
        }
        $autocode = $typecode . date('Ymd');
        $check = Transaction::where('type', $type)->orderBy('created_at', 'desc')->first();
        $strpad = str_pad(+1, 5, '0', STR_PAD_LEFT);
        
        if (!empty($check)) {            
            $lastcode = substr($check->code, -5);            
            $autocode = "INV" . date('Ym') . str_pad($lastcode + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $autocode .= $strpad;
        }
        
        return $autocode;
    }

    public function index()
    {
        $transactions = Transaction::with('transaction_detail')->where('customer_id', auth()->user()->id)->get();
        
        return view('front.page.transactions.index', compact('transactions'));
    }

    public function createTransaction($type, $reference_id = null)
    {
        try {            
            $autocode = $this->autocode($type);
            
            if (in_array($type, ['service', 'event'])) {
                $insertTransaction = $this->nonCart($type, $autocode, $reference_id);
            }
            
            return $insertTransaction;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function nonCart($type, $code, $reference_id = null)
    {
        $uuid = Str::orderedUuid();
        $void_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+1 day'));
        
        if ($type == 'service') {
            $reference = Services::find($reference_id);            
            $price = $reference->price;
            $reference = $reference->name;
        }

        if ($type == 'event') {
            $reference = Events::find($reference_id);
            $price = $reference->price;
            $reference = $reference->name;
        }
        
        try {
            DB::beginTransaction();
            $insertTransaction = Transaction::create([
                'id' => $uuid,
                'code' => $code,
                'customer_id' => auth()->user()->id,
                'type' => $type,
                'total' => $price,
                'note' => $reference,
                'payment_status' => 'unpaid',
                'void_at' => $void_at
            ]);

            $insertDetail = TransactionDetail::create([
                'transaction_id' => $uuid,
                'reference_id' => $reference_id,
                'description' => $reference,
                'qty' => 1,
                'price' => $price,
                'sub_total' => $price*1                
            ]);

            DB::commit();
            return [
                'status' => true,
                'message' => 'Berhasil',
                'transaction_id' => $uuid,
                'data' => $insertTransaction
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'status' => false,
                'message' => $th->getMessage()
            ];
        }





    }
}
