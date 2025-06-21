<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Events;
use App\Models\CartItem;
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
                $typecode = 'SRV';
                break;
            case 'product':
                $typecode = 'PRD';
                break;
            case 'event':
                $typecode = 'EVT';
                break;
            default:
                $typecode = 'INV';
                break;
        }

        $autocode = $typecode . date('Ymd');
        $lastcode = Transaction::where('type', $type)
            ->orderByDesc('created_at')
            ->value('code');
        if ($lastcode) {
            $lastnum = (int) substr($lastcode, -5);
            $date = substr($lastcode, 3, 8);
            if ($date == date('Ymd')) {
                $autocode .= str_pad($lastnum + 1, 5, '0', STR_PAD_LEFT);
            } else {
                $autocode .= str_pad(1, 5, '0', STR_PAD_LEFT);
            }
        } else {
            $autocode .= str_pad(1, 5, '0', STR_PAD_LEFT);
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

            if (in_array($type, ['product'])) {
                $insertTransaction = $this->cart($type, $autocode, $reference_id);
            }

            return $insertTransaction;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function cart($type, $code, $costArray)
    {
        $uuid = Str::orderedUuid();
        $void_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+1 day'));

        $getCartItems = CartItem::with('product')->where('customer_id', auth()->user()->id)->where('is_paid', 0)->get();

        try {
            DB::beginTransaction();
            $insertTransaction = Transaction::create([
                'id' => $uuid,
                'code' => $code,
                'customer_id' => auth()->user()->id,
                'type' => $type,
                'total' => $costArray['cartTotalPrice'],
                'shipping' => $costArray['shippingCost'],
                'note' => 'Pembelian ' . count($getCartItems) . ' produk',
                'payment_status' => 'unpaid',
                'void_at' => $void_at
            ]);

            // Loop through the cart items and create a new transaction detail
            // for each one.
            foreach ($getCartItems as $key => $value) {
                $insertDetail = TransactionDetail::create([
                    'transaction_id' => $uuid,
                    'reference_id' => $value->product_id,
                    'description' => $value->product->name,
                    'qty' => $value->qty,
                    'price' => $value->product->price,
                    'sub_total' => $value->product->price * $value->qty
                ]);
            }

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
            $reference = $reference->title;
            $void_at = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+30 minutes'));
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
                'sub_total' => $price * 1
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
