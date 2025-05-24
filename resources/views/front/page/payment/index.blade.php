@extends('front.layouts.main')
@section('title', 'Payment Checkout')

@section('body')
<!-- Begin:: Checkout Section -->
        <section class="cartPage">
            <div class="container">
                <div class="row woocommerce">                
                    <div class="col-md-12">
                        <h3 id="order_review_heading">Your order</h3>
                        <div class="woocommerce-checkout-review-order checkout_page_only" id="order_review">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart-item">
                                        <td class="product-name">Cum sociis natoque</td>
                                        <td class="product-total">
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>14.00</bdi></span>
                                        </td>
                                    </tr>
                                    <tr class="cart-item">
                                        <td class="product-name">Habitant morbi tristique</td>
                                        <td class="product-total">
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>28.00</bdi></span>
                                        </td>
                                    </tr>
                                    <tr class="cart-item">
                                        <td class="product-name">Aenean ultricies</td>
                                        <td class="product-total">
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>24.00</bdi></span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td>
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>121.00</bdi></span>
                                        </td>
                                    </tr>
                                    <tr class="woocommerce-shipping-totals shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping">
                                            <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_flat_rate1" value="flat_rate:1" class="shipping_method" checked="checked"><label for="shipping_method_0_flat_rate1">Flat rate: <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>10.00</bdi></span></label>					
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping2" value="free_shipping:2" class="shipping_method"><label for="shipping_method_0_free_shipping2">Free shipping</label>					
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_local_pickup3" value="local_pickup:3" class="shipping_method"><label for="shipping_method_0_local_pickup3">Local pickup: <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>10.00</bdi></span></label>					
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>159.00</bdi></span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="woocommerce-checkout-payment" id="payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_bacs">
                                        <input checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs" type="radio">
                                        <label for="payment_method_bacs">Direct bank transfer</label>
                                        <div class="payment_box payment_method_bacs visibales">
                                            <p>
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cod">
                                        <input value="cod" name="payment_method" class="input-radio" id="payment_method_cod" type="radio">
                                        <label for="payment_method_cod">Cheque Payment</label>
                                        <div class="payment_box payment_method_cod">
                                            <p>
                                                Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal" type="radio">
                                        <label for="payment_method_paypal">Cash On Delivery</label>
                                        <div class="payment_box payment_method_paypal">
                                            <p>
                                                Pay with cash upon delivery.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="place-order">
                                <div class="woocommerce-terms-and-conditions-wrapper">
                                    <div class="woocommerce-privacy-policy-text">
                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="https://themewar.com/wp/prologue/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                    </div>
                                </div>
                                <button type="submit" class="button">Place Order</button>
                            </div>
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