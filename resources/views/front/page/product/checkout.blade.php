@extends('front.layouts.main')
@section('title', 'Product Checkout')
@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend/') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Checkout</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Checkout</p>
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

    <!-- Begin:: Checkout Section -->
    <section class="cartPage">
        <div class="container">
            <div class="row woocommerce">
                <div class="col-md-6">
                    <div class="woocommerce-billing-fields">
                        <h3>Billing Info</h3>
                        <div class="row">
                            <p class="col-lg-6">
                                <input placeholder="First name *" name="first_name" type="text">
                            </p>
                            <p class="col-lg-6">
                                <input placeholder="Last name *" name="last_name" type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Company name" name="company" type="text">
                            </p>
                            <div class="col-lg-12">
                                <div class="billing-countries">
                                    <select class="country_to_state country_select " id="billing_country"
                                        name="billing_country">
                                        <option value="">State / Country *</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="PW">Belau</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="VG">British Virgin Islands</option>
                                        <option value="BN">Brunei</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo (Brazzaville)</option>
                                        <option value="CD">Congo (Kinshasa)</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">CuraÇao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="CI">Ivory Coast</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao S.A.R., China</option>
                                        <option value="MK">Macedonia</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia</option>
                                        <option value="MD">Moldova</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="KP">North Korea</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PS">Palestinian Territory</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="QA">Qatar</option>
                                        <option value="IE">Republic of Ireland</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russia</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="ST">São Tomé and Príncipe</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="SX">Saint Martin (Dutch part)</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="SM">San Marino</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia/Sandwich Islands</option>
                                        <option value="KR">South Korea</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syria</option>
                                        <option value="TW">Taiwan</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom (UK)</option>
                                        <option selected="selected" value="US">United States (US)</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="WS">Western Samoa</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <p class="col-lg-12">
                                <input placeholder="House number and street name" name="address_1" type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Apartment, suite, unit, etc. (optional)" name="address_2"
                                    type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Town / City *" name="address_2" type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="County" name="County" type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Postcode *" name="postcode" type="text">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Phone *" name="phone" type="tel">
                            </p>
                            <p class="col-lg-12">
                                <input placeholder="Email address *" name="billing_email" type="email">
                            </p>
                            <p class="col-lg-12 create-account">
                                <input name="account" value="1" type="checkbox" id="cac">
                                <label for="cac">Create an account?</label>
                            </p>
                            <p class="col-lg-12 create-account shippDifferent">
                                <input name="ship-address" value="2" type="checkbox" id="ship_add">
                                <label for="ship_add">Ship to another address</label>
                            </p>
                            <p class="col-lg-12 order-note">
                                <textarea name="order" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
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
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>14.00</bdi></span>
                                    </td>
                                </tr>
                                <tr class="cart-item">
                                    <td class="product-name">Habitant morbi tristique</td>
                                    <td class="product-total">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>28.00</bdi></span>
                                    </td>
                                </tr>
                                <tr class="cart-item">
                                    <td class="product-name">Aenean ultricies</td>
                                    <td class="product-total">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>24.00</bdi></span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>121.00</bdi></span>
                                    </td>
                                </tr>
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
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>159.00</bdi></span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="woocommerce-checkout-payment" id="payment">
                            <ul class="wc_payment_methods payment_methods methods">
                                <li class="wc_payment_method payment_method_bacs">
                                    <input checked="checked" value="bacs" name="payment_method" class="input-radio"
                                        id="payment_method_bacs" type="radio">
                                    <label for="payment_method_bacs">Direct bank transfer</label>
                                    <div class="payment_box payment_method_bacs visibales">
                                        <p>
                                            Make your payment directly into our bank account. Please use your Order ID as
                                            the payment reference. Your order will not be shipped until the funds have
                                            cleared in our account.
                                        </p>
                                    </div>
                                </li>
                                <li class="wc_payment_method payment_method_cod">
                                    <input value="cod" name="payment_method" class="input-radio"
                                        id="payment_method_cod" type="radio">
                                    <label for="payment_method_cod">Cheque Payment</label>
                                    <div class="payment_box payment_method_cod">
                                        <p>
                                            Please send a check to Store Name, Store Street, Store Town, Store State /
                                            County, Store Postcode.
                                        </p>
                                    </div>
                                </li>
                                <li class="wc_payment_method payment_method_paypal">
                                    <input value="paypal" name="payment_method" class="input-radio"
                                        id="payment_method_paypal" type="radio">
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
                                    <p>Your personal data will be used to process your order, support your experience
                                        throughout this website, and for other purposes described in our <a
                                            href="http://themewar.com/wp/prologue/?page_id=3"
                                            class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.
                                    </p>
                                </div>
                            </div>
                            <button id="thanks" type="submit" class="button">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Checkout Section -->
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function($) {
            $('#thanks').on('click', function(e) {
                e.preventDefault();

                swal.fire({
                    title: 'Thank you for your order!',
                    text: 'Your order has been successfully placed.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                // var form = $(this).closest('form');
                // var data = form.serialize();
                // $.ajax({
                //     type: 'POST',
                //     url: form.attr('action'),
                //     data: data,
                //     success: function(response) {
                //         // Handle success response
                //         alert('Order placed successfully!');
                //     },
                //     error: function(xhr, status, error) {
                //         // Handle error response
                //         alert('An error occurred while placing the order.');
                //     }
                // });
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
