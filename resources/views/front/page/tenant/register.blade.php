@extends('front.layouts.main')
@section('title', 'Register Tenant')
@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">My Account</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Account</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->

    <!-- Begin:: Account Section -->
    <section class="cartPage">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="authWrap authLogin">
                        <h2 class="authTitle">Register Tenant</h2>
                        <div class="kioskList" ></div>
                        <form class="woocommerce-form-login" action="#" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input disabled id="email" placeholder="Email Address *" type="email" name="email"
                                        value="">
                                </div>
                                <div class="col-sm-12">
                                    <input  placeholder="Nama Tenant" type="text" name="name" value="">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="desc" id="" cols="30" rows="10" placeholder="Deskripsi Tenant"></textarea>
                                </div>

                                <div class="col-sm-12">
                                    <input placeholder="Phone Number" type="text" name="phone" value="">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="address" id="" cols="30" rows="10" placeholder="Alamat Tenant"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                        name="login" value="Log in">
                                        <i class="icofont-user-alt-7"></i>Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Account Section -->



@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Add your custom JavaScript code here
            $.ajax({
                type: "get",
                url: "{{ URL::to('tenant/data') }}",
                dataType: "json",
                success: function(response) {
                    if (response.status === false) {
                        // Handle success
                        var data = response.data;
                        $("#email").val(data.email+" (Your Current Email)");
                        console.log(data.email);

                    } else {
                        // Handle error
                        console.error("No data found");
                    }
                }
            });


        });
    </script>
@endpush
