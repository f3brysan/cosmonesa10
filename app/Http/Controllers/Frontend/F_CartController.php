<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use App\Models\CartItem;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Services\RajaOngkirService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class F_CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('customer_id', auth()->user()->id)->where('is_paid', 0)->get();
        $totalPaid = [];
        if (count($cartItems) > 0) {            
            $totalPaid = $this->countTotalPaid();        
        }
        
        return view('front.page.cart.index', compact('cartItems', 'totalPaid'));
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

    public function changeQty(Request $request)
    {
        try {
            // Retrieve the product with the given ID
            $checkQuota = Products::where('id', $request->id)->first();

            // Check if the product stock is less than 0
            if ($checkQuota->stock < 0) {
                // Return failure response if the product stock is less than 0
                return response()->json([
                    'success' => false,
                    'message' => 'Stok barang sudah habis'
                ]);
            }

            // Check if the request type is minus
            if ($request->type == 'minus') {
                // Decrease the quantity of the cart item
                $result = $this->removeQty($request->id);
            } else {
                // Increase the quantity of the cart item
                $result = $this->addQty($request->id, $checkQuota->stock);
            }

            // Calculate the total paid based on the updated quantity
            $totalPaid = $this->countTotalPaid();

            // Return success response with updated quantity
            return response()->json(array_merge($result, $totalPaid));

        } catch (\Throwable $th) {
            // Return error response if an exception is caught
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function removeQty($product_id)
    {
        // Retrieve the cart item for the given product and authenticated user
        $checkCart = CartItem::with('product')->where('product_id', $product_id)
            ->where('customer_id', auth()->user()->id)
            ->first();

        // Check if the quantity is greater than 1
        if ($checkCart->qty > 1) {
            // Decrease the quantity by 1
            $checkCart->update([
                'qty' => $checkCart->qty - 1
            ]);

            // Return success response with updated quantity
            $result = [
                'success' => true,
                'message' => 'Quantity item berhasil diubah',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' => number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ];
        } else {
            // Return failure response if quantity is not greater than 1
            $result = [
                'success' => false,
                'message' => 'Quantity item tidak boleh kurang dari 1',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' => number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ];
        }

        return $result;
    }

    public function addQty($product_id, $stock)
    {
        // Retrieve the cart item for the given product and authenticated user
        $checkCart = CartItem::with('product')->where('product_id', $product_id)
            ->where('customer_id', auth()->user()->id)
            ->first();

        // Check if the quantity is less than the stock
        if ($checkCart->qty < $stock) {
            // Increase the quantity by 1
            $checkCart->update([
                'qty' => $checkCart->qty + 1
            ]);

            // Return success response with updated quantity
            $result = [
                'success' => true,
                'message' => 'Quantity item berhasil diubah',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' => number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ];
        } else {
            // Return failure response if quantity is not less than the stock
            $result = [
                'success' => false,
                'message' => 'Quantity item tidak boleh lebih dari stock',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' => number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ];
        }

        return $result;
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

    public function countTotalPaid()
    {
        // Get all the items in the cart that are not paid yet
        // and calculate the total weight of the items
        $cartItems = CartItem::with('product')->where('customer_id', auth()->user()->id)->where('is_paid', 0)->get();
        $totalWeight = 0;
        foreach ($cartItems as $item) {
            $totalWeight += $item->product->weight * $item->qty;
        }

        // Get the address of the user
        $address = Address::where('user_id', auth()->user()->id)->first();

        // Calculate the total price of the items
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->qty;
        }

        // Set the origin city ID
        $citiesOrigins = '444';

        // Initialize the shipping cost and estimated days
        $ongkir = 0;

        // Get the shipping cost from RajaOngkir API
        $rajaOngkir = new RajaOngkirService();
        $getOngkir = $rajaOngkir->checkOngkir($citiesOrigins, $address->regency_id, $totalWeight, 'jne');

        // Loop through the shipping cost results and get the
        // shipping cost and estimated days for the 'REG' service
        foreach ($getOngkir[0]['costs'] as $key => $value) {
            if ($value['service'] == 'REG') {
                $ongkir = $value['cost'][0]['value'];
                $estimatedDays = $value['cost'][0]['etd'];
                $serviceShipping = $value['service'];
            }
        }

        // Calculate the total paid including the shipping cost
        $totalPaid = (int) $total + (int) $ongkir;

        // Return the result
        $result = [
            'total' => number_format($total, 0, '.', '.'),
            'ongkir' => number_format($ongkir, 0, '.', '.'),
            'totalPaid' => number_format($totalPaid, 0, '.', '.'),
            'estimatedDays' => $estimatedDays,
            'serviceShipping' => $serviceShipping
        ];

        return $result;
    }

    public function checkout(Request $request)
    {
        try {
            $getCartItems = CartItem::with('product')->where('customer_id', auth()->user()->id)->where('is_paid', 0)->get();

            foreach ($getCartItems as $key => $value) {
                if ($value->product->stock < $value->qty) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Stok barang tidak mencukupi'
                    ], 500);
                }
            }

            $cartTotalPrice = (int) preg_replace('/\D/', '', $request->grandTotal);
            $shippingCost = (int) preg_replace('/\D/', '', $request->shippingCost);

            $costArray = [
                'cartTotalPrice' => $cartTotalPrice,
                'shippingCost' => $shippingCost
            ];

            $transaction = new F_TransactionController();
            $createTransaction = $transaction->createTransaction('product', $costArray);

            $transaction_id = $createTransaction['transaction_id'];
            $transaction_id_crypt = Crypt::encrypt($transaction_id->__tostring());            

            return response()->json([
                'success' => true,
                'transaction_id' => $transaction_id_crypt
            ], 200);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
