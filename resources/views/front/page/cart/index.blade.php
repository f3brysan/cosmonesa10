@extends('front.layouts.main')
@section('title', 'Product Cart')
@section('body')
    <!-- popup sidebar widget -->
    <section class="popup_sidebar_sec">
        <div class="popup_sidebar_overlay"></div>
        <div class="widget_area">
            <a href="javascript:void(0);" class="widget_closer"><i class="icofont-close-line"></i></a>
            <div class="center_align">
                <div class="about_widget_area">
                    <div class="wd_logo">
                        <a href="index.html"><img src="{{ asset('frontend/') }}/images/logo.png" alt="makeover" /></a>
                    </div>
                    <p>
                        We take a bottom-line approach to each project. Our clients consistently see increased traffic,
                        enhanced brand loyalty and new leads thanks to our work.
                    </p>
                    <div class="icon_box_04">
                        <i class="noun-noun_call_1624888"></i>
                        <h4>Call Us</h4>
                        <p>1.800.321.9876</p>
                    </div>
                    <div class="icon_box_04">
                        <i class="noun-noun_Email_485891"></i>
                        <h4>Write us</h4>
                        <p>hello@makeover.com</p>
                    </div>
                    <div class="icon_box_04">
                        <i class="noun-noun_Address_1271842"></i>
                        <h4>Address</h4>
                        <p>70 Greenview Ave. Temple Hills,<br> MD 20748, USA</p>
                    </div>
                    <div class="social_item">
                        <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                        <a href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                        <a href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popup sidebar widget -->

    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend/') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Cart</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Cart</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="{{ asset('frontend/') }}/images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->

    <!-- Begin:: Cart Section -->
    <section class="cartPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="woocommerce" id="cartTables">
                        <form action="#" method="post" class="woocommerce-cart-form">
                            <table class="shop_table" id="cartTable">
                                <thead>
                                    <tr>
                                        <th class="product-name">Item</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        @php
                                            $subtotal = $item->product->price * $item->qty;
                                        @endphp
                                        <tr class="cart_item">
                                            <td class="product-name" data-title="Product">
                                                <a class="p-img" href="single-product.html"><img
                                                        src="{{ asset('frontend/') }}/images/product/2.jpg"
                                                        alt=""></a>
                                                <a href="javascript:void(0);">{{ $item->product->name }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">Rp</span>{{ number_format($item->product->price, 0, '.', '.') }}</bdi></span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity quantityd clearfix">
                                                    <button type="button" class="minus qtyBtn btnMinus"
                                                        onclick="changeQty('{{ $item->product_id }}', 'minus')">-</button>
                                                    <input type="number" class="carqty input-text qty text" name="quantity"
                                                        value="{{ $item->qty }}" readonly>
                                                    <button type="button" class="plus qtyBtn btnPlus"
                                                        onclick="changeQty('{{ $item->product_id }}', 'plus')">+</button>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Subtotal">
                                                <span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">Rp </span><span id="subTotal_{{ $item->product_id }}">{{ number_format($subtotal, 0, '.', '.') }}</span></bdi></span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="javascript:void(0);" class="remove">×</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                        <div class="row">
                            <div class="col-xl-7 col-lg-6 col-md-4"></div>
                            <div class="col-xl-5 col-lg-6 col-md-8">
                                <div class="cart-collaterals">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table class="shop_table shop_table_responsive">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td data-title="Subtotal"><span class="amount" id="cartTotal">Rp {{ $totalPaid['total'] }}</span></td>
                                                </tr>
                                                <tr class="woocommerce-shipping-totals shipping">
                                                    <th>Shipping</th>
                                                    <td data-title="Shipping">
                                                        <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                            <li>
                                                                <input type="radio" name="shipping_method[0]"
                                                                    data-index="0" id="shipping_method_0_flat_rate1"
                                                                    value="flat_rate:1" class="shipping_method"
                                                                    checked="checked"><label
                                                                    for="shipping_method_0_flat_rate1">Estimasi ({{ $totalPaid['estimatedDays'] }} hari) <span
                                                                        class="woocommerce-Price-amount amount"><bdi><span
                                                                                class="woocommerce-Price-currencySymbol">Rp</span><span id="shippingCost">{{ $totalPaid['ongkir'] }}</span></bdi></span></label>
                                                            </li>                                                           
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td data-title="Total"><strong><span
                                                                class="amount" id="grandTotal">Rp {{ $totalPaid['totalPaid'] }}</span></strong> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a class="checkout-button alt wc-forward" onclick="checkoutCart()" href="javascript:void(0);">Proceed
                                                to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Cart Section -->
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        function changeQty(id, type) {
            console.log(id, type);
            $.ajax({
                type: "POST",
                url: "{{ URL::to('cart/change-qty') }}",
                data: {
                    id: id,
                    type: type
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    if (response.success === true) {
                        $("#subTotal_" + id).html(response.subtotal);     
                        $("#cartTotal").html('Rp '+response.total);        
                        $("#grandTotal").html('Rp '+response.totalPaid);           
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        }

        function checkoutCart() {
            var grandTotal = $("#cartTotal").html();
            var shippingCost = $("#shippingCost").html();

            $.ajax({
                type: "POST",
                url: "{{ URL::to('checkout') }}",
                data: {
                    grandTotal: grandTotal,
                    shippingCost: shippingCost
                },
                dataType: "JSON",
                success: function (response) {
                    console.log(response);      
                    if (response.success === true) {
                        window.location.href = "{{ URL::to('checkout') }}/" + response.transaction_id;
                    }                            
                }
            });
            
        }
    </script>
@endpush
