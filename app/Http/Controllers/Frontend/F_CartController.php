<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Products;
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

    public function changeQty(Request $request)
    {
        try {
            $checkQuota = Products::where('id', $request->id)->first();

            if ($checkQuota->stock < 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok barang sudah habis'
                ]);
            }

            if ($request->type == 'minus') {
                return $this->removeQty($request->id);
            } else {
                return $this->addQty($request->id, $checkQuota->stock);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Decrease the quantity of a cart item for the authenticated user.
     *
     * @param int $product_id The ID of the product to decrease the quantity for.
     * @return \Illuminate\Http\JsonResponse The response indicating success or failure of the operation.
     */
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
            return response()->json([
                'success' => true,
                'message' => 'Quantity item berhasil diubah',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' =>  number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ]);
        } else {
            // Return failure response if quantity is not greater than 1
            return response()->json([
                'success' => false,
                'message' => 'Quantity item tidak boleh kurang dari 1',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' =>  number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ]);
        }
    }

    /**
     * Increase the quantity of a cart item for the authenticated user.
     *
     * @param int $product_id The ID of the product to increase the quantity for.
     * @param int $stock The stock of the product.
     * @return \Illuminate\Http\JsonResponse The response indicating success or failure of the operation.
     */
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
            return response()->json([
                'success' => true,
                'message' => 'Quantity item berhasil diubah',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' =>  number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ]);
        } else {
            // Return failure response if quantity is not less than the stock
            return response()->json([
                'success' => false,
                'message' => 'Quantity item tidak boleh lebih dari stock',
                'product_id' => $checkCart->product_id,
                'qty' => $checkCart->qty,
                'subtotal' => number_format($checkCart->product->price * $checkCart->qty, 0, '.', '.')
            ]);
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
