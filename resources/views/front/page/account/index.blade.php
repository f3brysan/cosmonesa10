@extends('front.layouts.main')
@section('title', 'Account Settings')
@push('css')
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush
@section('body')
    {{-- <style>
        #kodepos::-webkit-outer-spin-button,
        #kodepos::-webkit-inner-spin-button {
            -webkit-appearance: none !important;
            margin: 0 !important;
        }

        #kodepos {
            -moz-appearance: textfield !important;
        }
    </style> --}}
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
                                        <tbody id="yourTable">
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
                                        data-toggle="modal" data-target="#my-modal">
                                        <i class="icofont-user-alt-7"></i>Edit Data Personal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="authWrap authLogin">
                                        <h2 class="authTitle">Address Information</h2>
                                        <table class="table">
                                            <tbody id="addressTable">
                                                <tr>
                                                    <th>
                                                        <p style="text-align:right;" class="provinsi">Provinsi :</p>
                                                    </th>
                                                    <td>
                                                        <p class="prov" style="display: inline;">Provinsi</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p style="text-align:right;">Kab/Kota :</p>
                                                    </th>
                                                    <td>
                                                        <p class="kabkota" style="display: inline;">Kab/Kota</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p style="text-align:right;">kodepos :</p>
                                                    </th>
                                                    <td>
                                                        <p class="kodepos" style="display: inline;">kodepos</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <p style="text-align:right;" class="alamat">Alamat Lengkap :</p>
                                                    </th>
                                                    <td>
                                                        <p class="alamat" style="display: inline;">Alamat Lengkap</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button id="edit-alamat" type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                        data-toggle="modal" data-target="#alamat-modal">
                                        <i class="icofont-user-alt-7"></i>Edit Alamat
                                    </button>
                                </div>
                            </div>
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
                                            <input disabled placeholder="Email *" id="email" type="email"
                                                name="email" value="">
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
        <div id="alamat-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="modal-title">Edit Alamat</h5>
                                <button id="save-btn" type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="col-sm-12">
                                <div id="alert" class="alert alert-danger" style="display: none;">
                                    <strong>Alert!</strong> Data tidak ditemukan. anda bisa mengisi alamat
                                    secara manual
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-body">
                        <form id="formAlamat" class="woocommerce-form-login" action="#">
                            <div class="row">
                                <div class="col-sm-12" id="provinceSelectContainer">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="provinces" id="provinces">
                                        {{-- <option value="">Silahkan Pilih</option> --}}
                                        {{-- @foreach ($provinces as $province)
                                            <option value="{{ $province['province_id'] }}">{{ $province['province'] }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-sm-12" id="citySelectContainer">
                                    <label for="cities">Kota/Kabupaten</label>
                                    <select name="cities" id="citySelect"></select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="kodepos">Kodepos</label>
                                    <input class="form-control" id="kodepos" type="text" name="kodepos"
                                        placeholder="Kode Pos" maxlength="7">
                                </div>
                                <div class="col-sm-12">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="10">Tulis Alamat Lengkap</textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button id="save-btn" type="submit"
                                        class="woocommerce-button button woocommerce-form-login__submit mo_btn"
                                        name="login" value="Log in">
                                        <i class="icofont-user-alt-7"></i>Simpan
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script>
        $(document).ready(function() {


            fetchUpdatedProfile();
            fetchAddress();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $('#edit-data').click(function() {
                // Show the modal
                $('#my-modal').modal('show');
                $.ajax({
                    url: `{{ URL::to('/profile') }}`,
                    type: 'GET',
                    success: function(response) {
                        data = response.data;
                        // console.log(data);
                        // Populate the form fields with the response data
                        formattedDate = data.tgl ? convertIndonesianDate(data.tgl) :
                            "00-00-0000";
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
            // saving edit profile
            var table = $('.table');
            if ($("#edit").length > 0) {
                $("#edit").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');

                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('/savebio') }}",
                            data: $('#edit').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#edit').trigger("reset");
                                $('#my-modal').modal("hide");
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

            function fetchUpdatedProfile() {
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
            }

            // Function to update profile fields
            function updateProfileFields(response) {
                let data = response.data;

                // Update individual text fields
                $('.name').text(data.nama ? data.nama : "Masih Kosong");
                $('.email').text(data.email ? data.email : "Masih Kosong");
                $('.jk').text(data.jk ? data.jk : "Masih Kosong");
                $('.tgl').text(data.tgl ? data.tgl : "Masih Kosong");
                $('.hp').text(data.hp ? data.hp : "Masih Kosong");

                // Refresh the table after updating fields
                reloadTable(data);
            }

            function reloadTable(data) {
                let tableBody = $('#yourTable'); // Select the tbody
                tableBody.empty(); // Clear existing rows

                // Create a new row based on updated data
                let row = `<tr>
                            <th><p style="text-align:right;">Nama:</p></th>
                            <td><p class="name" style="display: inline;">${data.nama ? data.nama : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Email:</p></th>
                            <td><p class="email" style="display: inline;">${data.email ? data.email : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Jenis Kelamin:</p></th>
                            <td><p class="jk" style="display: inline;">${data.jk ? data.jk : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Tanggal Lahir:</p></th>
                            <td><p class="tgl" style="display: inline;">${data.tgl ? data.tgl : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">No. HP:</p></th>
                            <td><p class="hp" style="display: inline;">${data.hp ? data.hp : "Masih Kosong"}</p></td>
                        </tr>`;

                tableBody.append(row); // Append the refreshed table row
            }

            function reloadTableAddress(data) {
                let tableBody = $('#addressTable'); // Select the tbody
                tableBody.empty(); // Clear existing rows

                // Create a new row based on updated data
                let row = `
                        <tr>
                            <th><p style="text-align:right;">Provinsi:</p></th>
                            <td><p class="prov" style="display: inline;">${data.province_name ? data.province_name : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Kab/Kota:</p></th>
                            <td><p class="kabkota" style="display: inline;">${data.regency_name ? data.regency_name : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Kode Pos:</p></th>
                            <td><p class="kodepos" style="display: inline;">${data.kodepos ? data.kodepos : "Masih Kosong"}</p></td>
                        </tr>
                        <tr>
                            <th><p style="text-align:right;">Alamat Lengkap:</p></th>
                            <td><p class="alamat" style="display: inline;">${data.detail ? data.detail : "Masih Kosong"}</p></td>
                        </tr>`;

                tableBody.append(row); // Append the refreshed table row
            }





            // ================= Address Section ==============================
            // Add a click event listener to all "ubah" links
            $('#edit-alamat').click(function() {


                fetchProvinces();
                //   $('#citySelect').select2();
                //   $('#provinces').select2();
                $("#kodepos").attr({
                    "type": "number",
                    "maxlength": "7"
                }).on("input", function() {
                    $(this).val($(this).val().replace(/[^0-9]/g, '').slice(0, 7));
                });
                // Initially hide city select
                $('#citySelectContainer').hide();

                $('#provinces').on('change', function() {
                    let selectedProvinceId = $(this)
                        .val(); // Get selected province ID
                    // console.log(selectedProvinceId);
                    if (selectedProvinceId) {
                        $('#citySelectContainer')
                            .show(); // Show city select when province is selected
                        fetchCities(
                            selectedProvinceId); // Load city options dynamically

                    } else {
                        $('#citySelectContainer')
                            .hide(); // Hide if no province is selected
                    }
                });
                // Fetch provinces and cities
                $.ajax({
                    url: `{{ URL::to('/address') }}`,
                    type: 'GET',
                    success: function(response) {
                        data = response.data;
                        if (data) {
                            // console.log(data);
                            $('#provinces').val(data.province_id).trigger(
                                'change');
                                setTimeout(function() {
                                $('#citySelect').val(data.regency_id).trigger('change');
                                    // console.log("This runs after 2 seconds!");
                                }, 2000);

                            $("#kodepos").val(data.kodepos);
                            $("#address").text(data.detail);

                        } else {

                            // Handle the case when no data is returned
                            $("#alert").show();

                            // Swal.fire({
                            //     title: "Gagal!",
                            //     text: response.message,
                            //     icon: "error"
                            // });
                        }
                        // Populate the form fields with the response data

                    },
                    error: function(xhr, status, error) {
                        console.error(`AJAX Error: ${status} - ${error}`);
                    }
                });
            });
            // Function to save and update address fields
            if ($("#formAlamat").length > 0) {
                $("#formAlamat").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('/saveaddress') }}",
                            data: $('#formAlamat').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#formAlamat').trigger("reset");
                                $('#alamat-modal').modal("hide");
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
            // Function to update address fields
            function updateAddressFields(response) {

                let data = response.data;
                if (data) {
                    $('.prov').text(data.province_name ?? "Masih Kosong");
                    $('.kabkota').text(data.regency_name ?? "Masih Kosong");
                    $('.kodepos').text(data.kodepos ?? "Masih Kosong");
                    $('.alamat').text(data.alamat ?? "Masih Kosong");
                    reloadTableAddress(data);
                } else {
                    $('.prov, .kabkota, .kodepos, .alamat').text("Masih Kosong");
                }
            }

            // Add a click event listener to all "ubah" links
            function fetchAddress() {
                // Make the AJAX request
                $.ajax({
                    url: `{{ URL::to('/address') }}`,
                    type: 'GET',
                    success: function(response) {
                        updateAddressFields(response); // Directly pass the JSON response
                    },
                    error: function(xhr, status, error) {
                        console.error(`AJAX Error: ${status} - ${error}`);
                    }
                });
            }
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
                            $select.append(`<option value="">--Pilih Provinsi--</option>`);

                            // Append new options
                            response.data.forEach(item => {
                                let newOption = new Option(item.province, item.province_id,
                                    false, false);
                                $select.append(newOption);
                            });

                            // Refresh Select2 properly
                            $select.select2({
                                dropdownParent: $(
                                    '#provinceSelectContainer'
                                ) // Ensures dropdown stays inside the modal
                            }); // Ensure Select2 reinitializes
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }

            function fetchCities(provinceId) {
                $.ajax({
                    url: `{{ URL::to('back/api/cities') }}/${provinceId}`,
                    dataType: 'json',
                    success: function(response) {
                        let $citySelect = $('#citySelect'); // Target city dropdown
                        $citySelect.empty(); // Clear previous options
                        $citySelect.append(`<option value="">--Pilih Kab./Kota--</option>`);

                        if (response.success && Array.isArray(response.data)) {
                            response.data.forEach(city => {
                                let newOption = new Option(city.city_name, city.city_id, false,
                                    false);
                                $citySelect.append(newOption);
                            });

                            // Reinitialize Select2
                            $citySelect.select2({
                                dropdownParent: $(
                                    '#citySelectContainer'
                                ) // Ensures dropdown stays inside the modal
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }
            // Run the function to fetch and populate the select box



        });
    </script>
@endpush
