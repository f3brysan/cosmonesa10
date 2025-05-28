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
                    <h2 class="banner-title">Register Tenant</h2>
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

                        <div class="kioskList" id="status" hidden>
                            <h2 class="authTitle">Check Kiosku</h2>
                            <div class="alert alert-success">
                                <p id="message"></p>
                            </div>
                            <a href="{{ URL::to('back/kiosku/service') }}"
                                class="woocommerce-button button woocommerce-form-login__submit mo_btn"><i
                                    class="icofont-user-alt-7"></i> Ke Kiosku</a>
                        </div>

                        <div class="form" id="form" hidden>
                            <h2 class="authTitle">Register Tenant</h2>
                            <p id="message"></p>

                            <form id="formTenant" class="woocommerce-form-login">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <input disabled id="email" placeholder="Email Address *" type="email"
                                            name="email" value="">
                                    </div>
                                    <div class="col-sm-12">
                                        <input placeholder="Nama Tenant" type="text" name="name" value="">
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
                                            name="login" id="save-btn">
                                            <i class="icofont-user-alt-7"></i>Register Now
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End:: Account Section -->



@endsection

@push('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-6Uv4DnDGNrAkJ6xZn5ltz2vq6ywgd+iXQNDb76NX2lomUJgo4sNMm1zytAPlTGmBlrFmGbJbo1gLXmV8jHVTPyA==" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            // Add your custom JavaScript code here
            check_status();
            function check_status() {
                $.ajax({
                    type: "get",
                    url: "{{ URL::to('/tenant-register/check') }}",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === true) {
                            $(".form").removeAttr('hidden');
                            $("#message").html(response.message);
                            // console.log(response.status);
                        } else {
                            $("#status").removeAttr('hidden');
                            $("#message").html(response.message);
                            // console.log(response.status);
                        }
                    }
                });
            }
            $.ajax({
                type: "get",
                url: "{{ URL::to('tenant/data') }}",
                dataType: "json",
                success: function(response) {
                    if (response.status === false) {
                        // Handle success
                        var data = response.data;
                        $("#email").val(data.email + " (Your Current Email)");
                        console.log(data.email);

                    } else {
                        // Handle error
                        console.error("No data found");
                    }
                }
            });

            if ($("#formTenant").length > 0) {
                $("#formTenant").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');
                        console.log($('#formTenant').serialize());
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('/tenant-register/store/') }}",
                            data: $('#formTenant').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#formTenant').trigger("reset");
                                $('#save-btn').html('Simpan');
                                console.log(data);
                                if (data.status === "success") {
                                    // After update, fetch the latest profile data
                                    fetchUpdatedProfile();
                                }

                                // updateProfileFields(data);
                                Swal.fire({
                                    title: "Berhsil!",
                                    text: data.message,
                                    icon: "success"
                                });
                            },
                            error: function(data) {
                                console.log('Error', data);
                                $('#save-btn').html('Simpan');
                            }
                        });
                    }
                })
            }

        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
