<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap 5 Form</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Address</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>


                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade  show active" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
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
                                <div class="col-6 text-end">
                                    <button id="edit-data" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#my-modal">
                                        Launch demo modal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Contact
                        tab
                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        Home tab</div>

                </div>
            </div>
        </div>

    </div>



    <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="editForm">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jk" name="jk" required>
                                        <option value="">Silahkan Pilih</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="W">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="hp" name="hp"
                                        required>
                                </div>

                                <button id="save-btn" type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                        $('#name').val(data.nama);
                        $('#email').val(data.email);
                        $('#jk').val(data.jk);
                        $('#tgl').val(data.tgl);
                        $('#hp').val(data.hp);
                    },
                    error: function(xhr, status, error) {
                        console.error(`AJAX Error: ${status} - ${error}`);
                    }
                })
            });

            // Add a click event listener to all "ubah" links

// let provinceData = [];

            // function fetchProvinces() {
            //     $.ajax({
            //         url: "{{ URL::to('back/api/provinces') }}",
            //         dataType: "json",
            //         success: function(response) {
            //             if (response.success && Array.isArray(response.data)) {
            //                 let $select = $('#provinces');

            //                 // Clear existing options
            //                 $select.empty();
            //                 $select.append(
            //                     `<option value="">--Pilih Provinsi--</option>`
            //                 );
            //                 // Append new options
            //                 response.data.forEach(item => {
            //                     $select.append(
            //                         `<option value="${item.province_id}">${item.province}</option>`
            //                     );
            //                 });

            //                 // // Refresh Nice Select after updating options
            //                 // $select.niceSelect('update');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error("AJAX Error:", status, error);
            //         }
            //     });
            // }

            // function fetchCities(provinceId) {
            //     $.ajax({
            //         url: `{{ URL::to('back/api/cities') }}/${provinceId}`, // Replace with your actual API route
            //         dataType: 'json',
            //         success: function(response) {
            //             let $citySelect = $('#citySelect'); // Target city dropdown
            //             $citySelect.empty(); // Clear previous options
            //             $citySelect.append(
            //                 `<option value="">--Pilih Kab./Kota--</option>`
            //             );
            //             if (response.success && Array.isArray(response.data)) {
            //                 response.data.forEach(city => {
            //                     $citySelect.append(
            //                         `<option value="${city.city_id}">${city.city_name}</option>`
            //                         );
            //                 });

            //                 $citySelect.niceSelect('update'); // Refresh Nice Select
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             console.error("AJAX Error:", status, error);
            //         }
            //     });
            // }
            // // Run the function to fetch and populate the select box
            // fetchProvinces();

            // // Initially hide city select
            // $('#citySelectContainer').hide();

            // $('#provinces').on('change', function() {
            //     let selectedProvinceId = $(this).val(); // Get selected province ID
            //     // console.log(selectedProvinceId);
            //     if (selectedProvinceId) {
            //         $('#citySelectContainer').show(); // Show city select when province is selected
            //         fetchCities(selectedProvinceId); // Load city options dynamically
            //     } else {
            //         $('#citySelectContainer').hide(); // Hide if no province is selected
            //     }
            // });

        });
    </script>
</body>

</html>
