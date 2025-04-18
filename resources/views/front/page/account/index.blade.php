@extends('front.layouts.main')
@section('title', 'Account Settings')

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
            <div class="product_tabarea">
                <ul class="nav nav-tabs productTabs" id="productTabs" role="tablist">

                    <li class="nav-item" role="presentation">
                        <a id="personalinfo-tab" data-toggle="tab" href="#personalinfo" role="tab"
                            aria-controls="personalinfo" aria-selected="false">Personal Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                            aria-selected="false">Review (3)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show " id="personalinfo" role="tabpanel" aria-labelledby="personalinfo-tab">
                        <div class="col-lg-12">
                            <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Nama :</p>
                                        </th>
                                        <td>
                                            <p class="nama">Nama <a style="font-weight: bold;" data-target="#my-modal"
                                                    data-toggle="modal" href="#" data-type="nama">ubah</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Tanggal Lahir :</p>
                                        </th>
                                        <td>
                                            <p class="tgl">Tanggal Lahir <a style="font-weight: bold;"
                                                    data-target="#my-modal" data-toggle="modal" href="#"
                                                    data-type="tgl">ubah</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Jenis Kelamin :</p>
                                        </th>
                                        <td>
                                            <p class="jk">Laki-Laki <a style="font-weight: bold;"
                                                    data-target="#my-modal" data-toggle="modal" href="#"
                                                    data-type="jk">ubah</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Alamat :</p>
                                        </th>
                                        <td>
                                            <p class="alamat">Alamat <a style="font-weight: bold;" data-target="#my-modal"
                                                    data-toggle="modal" href="#" data-type="alamat">ubah Alamat</a>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="edit">
                                            <input class="form-control" type="text" name="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="col-lg-12">
                            <div class="authWrap authLogin">
                                <h2 class="authTitle">My Personal Data</h2>
                                <form class="woocommerce-form-login" action="#" method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input placeholder="Full Name *" type="text" name="name"
                                                value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="Email Address *" type="email" name="email"
                                                value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="provinsi"></label>
                                            <select name="" id="">
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea name="address" id="" cols="30" rows="10">Tulis Alamat Lengkap</textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="Password *" type="password" name="password">
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="Confirm Password *" type="password"
                                                name="confirm_password">
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
            </div>







        </div>
    </section>
    <!-- End:: Account Section -->
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a click event listener to all "ubah" links
            document.querySelectorAll('a[href="#"]').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Get the corresponding type from the data-type attribute
                    let type = this.getAttribute('data-type');

                    // Extract the text content based on the context of the <p> element
                    let textToSend = this.closest('p').textContent.trim();
                    // Clean up text by removing the "ubah" link
                    textToSend = textToSend.replace(this.textContent.trim(), '').trim();
                    // console.log(textToSend);
                    // // Dynamically set the modal content based on the clicked link

                    if (type === 'jk') {
                        document.querySelector('.modal-body').innerHTML =
                            `<form id="edit">
                            <select class="form-control" name="${type}">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </form>`;
                    } else {
                        document.querySelector('.modal-body').innerHTML =
                            `<form id="edit">
                            <input class="form-control" type="text" name="${type}" value="${textToSend}">
                        </form>`;

                        document.querySelector('.modal-title').textContent = `Edit ${type}`;
                        // Show the modal
                    }




                    $('#myModal').modal('show');
                });
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
