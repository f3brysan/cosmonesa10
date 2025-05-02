@extends('front.layouts.main')
@section('title', 'Account Settings')
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush
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
                        <a class="active" id="personalinfo-tab" data-toggle="tab" href="#personalinfo" role="tab"
                            aria-controls="personalinfo" aria-selected="false">Personal Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="alamat-tab" data-toggle="tab" href="#alamat" role="tab" aria-controls="alamat"
                            aria-selected="true">Alamat</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                            aria-selected="false">Review (3)</a>
                    </li> --}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show  active" id="personalinfo" role="tabpanel"
                        aria-labelledby="personalinfo-tab">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <p style="text-align:right;" class="nama">Nama :</p>
                                                </th>
                                                <td>
                                                    <p class="name" style="display: inline;">Nama</p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p style="text-align:right;">Email :</p>
                                                </th>
                                                <td>
                                                    <p class="email" style="display: inline;">Email</p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p style="text-align:right;" class="nama">Jenis Kelamin :</p>
                                                </th>
                                                <td>
                                                    <p class="jk" style="display: inline;">Laki-Laki</p>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p style="text-align:right;" class="nama">Tanggal Lahir :</p>
                                                </th>
                                                <td>
                                                    <p class="tgl" style="display: inline;">Tanggal Lahir</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <p style="text-align:right;" class="nama">No. HP :</p>
                                                </th>
                                                <td>
                                                    <p class="hp" style="display: inline;">Nomor HP</p>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    {{-- <button id="edit-data" type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#my-modal">
                                        Edit Data
                                    </button> --}}
                                    <button id="edit-data" type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                        data-toggle="modal"
                                        data-target="#my-modal">
                                        <i class="icofont-user-alt-7"></i>Edit Data Personal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                        <div class="col-lg-12">
                            <div class="authWrap authLogin">
                                <h2 class="authTitle">My Personal Data</h2>
                                <form class="woocommerce-form-login" action="#">
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
                                            <select name="provinces" id="provinces"></select>
                                        </div>
                                        <div class="col-sm-12" id="citySelectContainer">
                                            <label for="cities"></label>
                                            <select name="cities" id="citySelect"></select>
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
                                            <button id="save-btn" type="submit"
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
        <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button id="save-btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="authWrap authLogin">
                                <h2 class="authTitle">My Personal Data</h2>
                                <form class="woocommerce-form-login" id="edit">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input placeholder="Nama *" id="name" type="text" name="nama"
                                                value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="Email *" id="email" type="email" name="email"
                                                value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <select name="jk" id="jk">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="W">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="Tanggal Lahir *" id="datepicker" type="date"
                                                name="tgl" value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <input placeholder="No. HP *" id="hp" type="text" name="hp"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button id="save-btn" type="submit"
                                            class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                            name="login" value="Log in">
                                            <i class="icofont-user-alt-7"></i>Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($("#editForm").length > 0) {
                $("#editForm").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');

                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('/savebio') }}",
                            data: $('#editForm').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#editForm').trigger("reset");
                                $('#my-modal').modal("hide");
                                $('#save-btn').html('Simpan');

                                table.ajax.reload(null, false);
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

            function convertIndonesianDate(dateString) {
                // Create a mapping of month names to numbers
                const months = {
                    "Januari": "01",
                    "Februari": "02",
                    "Maret": "03",
                    "April": "04",
                    "Mei": "05",
                    "Juni": "06",
                    "Juli": "07",
                    "Agustus": "08",
                    "September": "09",
                    "Oktober": "10",
                    "November": "11",
                    "Desember": "12"
                };

                // Extract the day, month, and year from the string
                let parts = dateString.split(", ")[1].split(" ");
                let day = parts[0].padStart(2, '0'); // Ensure two-digit format
                let month = months[parts[1]]; // Convert month name to number
                let year = parts[2];

                return `${year}-${month}-${day}`; // Return the formatted date
            }


            // Function to update profile fields
            function updateProfileFields(data) {
                data = JSON.parse(data); // Parse the JSON response
                // Update each field, allowing empty strings to pass through

                $('.name').text(data.nama !== undefined && data.nama !== null ? data.nama :
                    "Masih Kosong");
                $('.email').text(data.email !== undefined && data.email !== null ? data.email :
                    "Masih Kosong");
                $('.jk').text(data.jk !== "" ? data.jk : "Masih Kosong"); // Empty string fallback
                $('.tgl').text(data.tgl !== "" ? data.tgl :
                    "Masih Kosong"); // Empty string fallback
                $('.hp').text(data.hp !== "" ? data.hp : "Masih Kosong"); // Empty string fallback
            }

            // Make the AJAX request
            $.ajax({
                url: `{{ URL::to('/profile') }}`,
                type: 'GET',
                success: function(response) {
                    updateProfileFields(response); // Directly pass the JSON response
                },
                error: function(xhr, status, error) {
                    console.error(`AJAX Error: ${status} - ${error}`);
                }
            });
            $('#edit-data').click(function() {
                // Show the modal
                $('#my-modal').modal('show');


                $.ajax({
                    url: `{{ URL::to('/profile') }}`,
                    type: 'GET',
                    success: function(response) {
                        data = JSON.parse(response);
                        // console.log(data);
                        // Populate the form fields with the response data
                        formattedDate = convertIndonesianDate(data.tgl);
                        $('#name').val(data.nama);
                        $('#email').val(data.email);

                        if (data.jk == "Laki-laki") {
                            $('#jk option[value="L"]').prop('selected', true);
                        } else {
                            $('#jk option[value="W"]').prop('selected', true);
                        }
                        // $('#jk').val();
                        // $('#tgl').val(data.tgl);
                        $('#datepicker').val(formattedDate);
                        $('#hp').val(data.hp);
                    },
                    error: function(xhr, status, error) {
                        console.error(`AJAX Error: ${status} - ${error}`);
                    }
                });
            });

            // Add a click event listener to all "ubah" links

            let provinceData = [];

            function fetchProvinces() {
                $.ajax({
                    url: "{{ URL::to('back/api/provinces') }}",
                    dataType: "json",
                    success: function(response) {
                        if (response.success && Array.isArray(response.data)) {
                            let $select = $('#provinces');

                            // Clear existing options
                            $select.empty();
                            $select.append(
                                `<option value="">--Pilih Provinsi--</option>`
                            );
                            // Append new options
                            response.data.forEach(item => {
                                $select.append(
                                    `<option value="${item.province_id}">${item.province}</option>`
                                );
                            });

                            // // Refresh Nice Select after updating options
                            // $select.niceSelect('update');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }

            function fetchCities(provinceId) {
                $.ajax({
                    url: `{{ URL::to('back/api/cities') }}/${provinceId}`, // Replace with your actual API route
                    dataType: 'json',
                    success: function(response) {
                        let $citySelect = $('#citySelect'); // Target city dropdown
                        $citySelect.empty(); // Clear previous options
                        $citySelect.append(
                            `<option value="">--Pilih Kab./Kota--</option>`
                        );
                        if (response.success && Array.isArray(response.data)) {
                            response.data.forEach(city => {
                                $citySelect.append(
                                    `<option value="${city.city_id}">${city.city_name}</option>`
                                );
                            });

                            $citySelect.niceSelect('update'); // Refresh Nice Select
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }
            // Run the function to fetch and populate the select box
            fetchProvinces();

            // Initially hide city select
            $('#citySelectContainer').hide();

            $('#provinces').on('change', function() {
                let selectedProvinceId = $(this).val(); // Get selected province ID
                // console.log(selectedProvinceId);
                if (selectedProvinceId) {
                    $('#citySelectContainer').show(); // Show city select when province is selected
                    fetchCities(selectedProvinceId); // Load city options dynamically
                } else {
                    $('#citySelectContainer').hide(); // Hide if no province is selected
                }
            });
        });
    </script>
@endpush
