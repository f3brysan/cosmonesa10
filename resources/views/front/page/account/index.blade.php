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
                        <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="true">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                            aria-selected="false">Review (3)</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show  active" id="personalinfo" role="tabpanel"
                        aria-labelledby="personalinfo-tab">
                        <div class="col-lg-12">
                            <table class="table table-light">
                                <tbody>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Nama :</p>
                                        </th>
                                        <td>
                                            <p class="name" style="display: inline;">Nama</p> -
                                            <a style="font-weight: bold; display: inline;" data-target="#my-modal"
                                                data-toggle="modal" href="#" data-type="nama">
                                                <i class="icofont-pencil-alt-5"></i> Ubah Nama
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="email">Email :</p>
                                        </th>
                                        <td>
                                            <p class="email" style="display: inline;">Email</p> -
                                            <a style="font-weight: bold; display: inline;" data-target="#my-modal"
                                                data-toggle="modal" href="#" data-type="email">
                                                <i class="icofont-pencil-alt-5"></i> Ubah Email
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Jenis Kelamin :</p>
                                        </th>
                                        <td>
                                            <p class="jk" style="display: inline;">Laki-Laki</p> -
                                            <a style="font-weight: bold; display: inline;" data-target="#my-modal"
                                                data-toggle="modal" href="#" data-type="jk">
                                                <i class="icofont-pencil-alt-5"></i> Ubah Jenis Kelamin
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">Tanggal Lahir :</p>
                                        </th>
                                        <td>
                                            <p class="tgl" style="display: inline;">Tanggal Lahir</p> -
                                            <a style="font-weight: bold; display: inline;" data-target="#my-modal"
                                                data-toggle="modal" href="#" data-type="tgl">
                                                <i class="icofont-pencil-alt-5"></i> Ubah Tanggal Lahir
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <p style="text-align:right;" class="nama">No. HP :</p>
                                        </th>
                                        <td>
                                            <p class="hp" style="display: inline;">Nomor HP</p> -
                                            <a style="font-weight: bold; display: inline;" data-target="#my-modal"
                                                data-toggle="modal" href="#" data-type="hp">
                                                <i class="icofont-pencil-alt-5"></i> Ubah Nomor HP
                                            </a>
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
                                        <form id="edit" method="POST" action="${actionUrl}"
                                            enctype="multipart/form-data">
                                            <input class="form-control" type="text" name="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                            <select name="provinces" id="provinces"></select>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {

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

                // // Log the updated values for verification
                // console.log("Updated name:", $('.name').text());
                // console.log("Updated email:", $('.email').text());
                // console.log("Updated jk:", $('.jk').text());
                // console.log("Updated tgl:", $('.tgl').text());
                // console.log("Updated hp:", $('.hp').text());
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




            let provinceData = [];

            function fetchProvinces(callback) {
                $.ajax({
                    url: "{{ URL::to('back/api/provinces') }}",
                    dataType: "json",
                    success: function(response) {
                        console.log("API Response:", response);

                        if (response.success && Array.isArray(response.data)) {
                            provinceData = response.data.map(item => ({
                                id: item.province_id,
                                text: item.province
                            }));

                            if (callback) callback(); // Trigger callback after data is loaded
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            }
            // Fetch provinces once on page load
            console.log("Parsed Data:", provinceData); // Verify parsed results

            $(document).ajaxComplete(function() {
                $('#provinces').select2({
                    placeholder: "Select a Province",
                    allowClear: true,
                    data: provinceData
                });
            });
            fetchProvinces();






            // $.ajax({
            //     type: "get",
            //     url: "{{ URL::to('back/api/provinces') }}",
            //     dataType: "json",
            //     success: function(response) {
            //         console.log(response)
            //     }
            // });







            // Add a click event listener to all "ubah" links
            $('a[data-type]').on('click', function(event) {
                event.preventDefault(); // Prevent default behavior

                // Get the type from the data-type attribute
                let type = $(this).data('type');

                // Extract the text content from the sibling <p> element
                let textToSend = $(this).siblings('p').text().trim();
                let actionUrl = `/savebio`;
                // Set up the modal content based on the type
                if (type === 'jk') {
                    $('.modal-body').html(`
                <form id="edit" method="POST" action="${actionUrl}">
                    <select class="form-control" name="${type}">
                        <option value="P">Laki-Laki</option>
                        <option value="W">Perempuan</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            `);
                } else if (type === 'tgl') {
                    $('.modal-body').html(`
                <form id="edit" method="POST" action="${actionUrl}">
                    <input class="form-control" type="text" id="datepicker" name="${type}" value="${textToSend}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            `);
                    // Initialize the date picker for the newly added input
                    $('#datepicker').datetimepicker({
                        format: 'Y-m-d',
                        timepicker: false,
                        maxDate: new Date(),
                        yearStart: 1900,
                        yearEnd: new Date().getFullYear()
                    });
                } else {
                    $('.modal-body').html(`
                <form id="edit" method="POST" action="${actionUrl}">
                    <input class="form-control" type="text" name="${type}" value="${textToSend}">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            `);
                }

                // Set the modal title dynamically
                $('.modal-title').text(`Edit ${type}`);

                // Show the modal
                $('#myModal').modal('show');
            });
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            let headers = {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            };
            $('#edit').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var data = $(this).serialize(); // Serialize the form data

                $.ajax({
                    url: $(this).attr('action'), // Use the form's action attribute dynamically
                    method: 'POST', // Ensure it's POST for form submission
                    data: data, // Send the serialized form data
                    headers: headers,
                    success: function(response) {
                        console.log("Server Response: ", response);
                        alert('Data updated successfully!');
                    },
                    error: function(error) {
                        console.error("Error: ", error);
                        alert('An error occurred while updating the data.');
                    }
                });
            });


        });
    </script>
@endpush
