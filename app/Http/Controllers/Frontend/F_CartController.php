<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class F_CartController extends Controller
{
    public function index()
    {        
        $cartItems = CartItem::with('product')->where('customer_id', auth()->user()->id)->where('is_paid', 0)->get();
        return view('front.page.cart.index', compact('cartItems'));
    }   
    public function addItems(Request $request) 
    {
        try {        
            $product_id = Crypt::decrypt($request->product_id);
            
            $create = CartItem::updateOrCreate(
                [
                    'product_id' => $product_id,
                    'customer_id' => auth()->user()->id,
                    'is_paid' => 0
                ],
                [
                    'product_id' => $product_id,
                    'customer_id' => auth()->user()->id,
                    'qty' => $request->qty
                ]
                );

                return response()->json([
                    'success' => true,
                    'message' => 'Item berhasil ditambahkan'
                ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function countUnpaidItems() 
    {
        try {
            $count = CartItem::where('customer_id', auth()->user()->id)->where('is_paid', 0)->count();
            return response()->json([
                'success' => true,
                'count' => $count
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
