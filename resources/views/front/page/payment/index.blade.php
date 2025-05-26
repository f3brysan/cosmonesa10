@extends('front.layouts.main')
@section('title', 'Payment Checkout')

@section('body')
    <!-- Begin:: Checkout Section -->
    <section class="cartPage">
        <div class="container">
            <div class="row woocommerce">
                <div class="col-md-12">
                    <h3 id="order_review_heading">Your order Code : {{ $transaction->code }}</h3>
                    <div class="woocommerce-checkout-review-order checkout_page_only" id="order_review">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = $transaction->total + $transaction->shipping;
                                @endphp
                                @foreach ($transaction->transaction_detail as $item)
                                    <tr class="cart-item">
                                        <td class="product-name">{{ $item->description }}</td>
                                        <td class="product-total">
                                            <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">Rp</span>{{ number_format($item->price, 0, '.', '.') }}</bdi></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">Rp</span>{{ number_format($transaction->total, 0, '.', '.') }}</bdi></span>
                                    </td>
                                </tr>
                                @if ($transaction->type == 'product')
                                    <tr class="woocommerce-shipping-totals shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping">
                                            <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0"
                                                        id="shipping_method_0_flat_rate1" value="flat_rate:1"
                                                        class="shipping_method" checked="checked"><label
                                                        for="shipping_method_0_flat_rate1">Flat rate: <span
                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">$</span>10.00</bdi></span></label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0"
                                                        id="shipping_method_0_free_shipping2" value="free_shipping:2"
                                                        class="shipping_method"><label
                                                        for="shipping_method_0_free_shipping2">Free shipping</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0"
                                                        id="shipping_method_0_local_pickup3" value="local_pickup:3"
                                                        class="shipping_method"><label
                                                        for="shipping_method_0_local_pickup3">Local pickup: <span
                                                            class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-currencySymbol">$</span>10.00</bdi></span></label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endif
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">Rp</span>{{ number_format($total, 0, '.', '.') }}</bdi></span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Status</th>
                                    <td class="product-name">{{ ucfirst($transaction->payment_status) }}</td>
                                </tr>
                                @if ($transaction->payment_status != 'unpaid')
                                    <tr class="order-total">
                                        <th>Bukti Bayar</th>
                                        <td class="product-name"><a
                                                href="{{ asset('storage/' . $transaction->payment_file) }}"
                                                class="btn btn-primary" target="_blank"> Lihat Bukti Bayar</a> </td>
                                    </tr>
                                @endif
                            </tfoot>
                        </table>
                        @if ($transaction->payment_status == 'unpaid')
                            <form action="{{ URL('checkout-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ Crypt::encrypt($transaction->id) }}">
                                <input type="hidden" name="code" id="code"
                                    value="{{ Crypt::encrypt($transaction->code) }}">
                                <div class="woocommerce-checkout-payment" id="payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input checked="checked" value="bacs" name="payment_method"
                                                class="input-radio" id="payment_method_bacs" type="radio">
                                            <label for="payment_method_bacs">Direct bank transfer</label>
                                            <div class="payment_box payment_method_bacs visibales">
                                                <p>
                                                    Lakukan pembayaran langsung ke rekening bank kami (BTN xxxxxxxx).
                                                    Gunakan ID
                                                    Pesanan Anda sebagai referensi pembayaran. Pesanan Anda tidak akan
                                                    diterima/disetujui sampai dana masuk ke rekening kami.
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="place-order">
                                    <div class="woocommerce-terms-and-conditions-wrapper">
                                        <div class="woocommerce-privacy-policy-text">
                                            <p>Silahkan unggah bukti pembayaran</p>
                                            <input type="file" name="bukti" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <button type="submit" class="button">Submit</button>
                                </div>
                            </form>                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Checkout Section -->
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
