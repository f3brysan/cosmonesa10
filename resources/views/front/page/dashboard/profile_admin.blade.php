@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- DataTables core CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- DataTables Buttons extension CSS (Bootstrap 4 styling) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">

    <!-- DataTables Responsive extension CSS (Bootstrap 4 styling) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        /* Modern button enhancements */
        .btn-modern {
            font-weight: 600;
            border-radius: 6px;
            padding: 8px 16px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-right: 12px;
        }

        .btn-modern:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
@endpush

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- Breadcrumb --}}
        <div class="row">
            <div class="col-xl-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('back/master/dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Profile Tampilan Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Profile Tampilan Dashboard</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable text-nowrap">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Id Profile</th>
                                        <th class="text-center">Carousel show</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addItemModal" tabindex="-1">
        <div class="modal-dialog">
            <form id="addItemForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="profile_name" class="form-control mb-2" placeholder="Profile Name"
                            required>
                        <input type="text" name="img_name" class="form-control mb-2" placeholder="Image Name" required>
                        <input type="file" name="img_path" class="form-control mb-2" placeholder="Image Path" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- CRUD Modal -->
    <div class="modal fade" id="crudModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('/store_img') }}" method="post" enctype="multipart/form-data"
                        class="dropzone" id="image-upload">
                        @csrf
                        {{-- <input type="hidden" name="product_id" id="product_id" value="{{ Crypt::encrypt($product->id) }}"> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="uploadFile" class="btn btn-primary">Upload Images</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables core JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons extension JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <!-- DataTables Responsive extension JS -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>
    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $('#myTable').DataTable({
                dom: 'Bfrtip', // B = Buttons, f = filter, r = processing, t = table, i = info, p = pagination
                responsive: true,
                buttons: [{
                        text: '<i class="fas fa-plus-circle mr-2"></i> Add Item',
                        className: 'btn btn-success btn-modern',
                        action: function() {
                            $('#addItemModal').modal('show');
                        }
                    },
                    {
                        text: '<i class="fas fa-images mr-2"></i> Add Images',
                        className: 'btn btn-info btn-modern',
                        action: function() {
                            $('#crudModal').modal('show');
                        }
                    }
                ],
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ URL::to('/admindex') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center'
                    },
                    {
                        data: 'profile_id',
                        name: 'profile_id',
                        className: 'text-center'
                    },

                    {
                        data: 'img',
                        name: 'img',
                        className: 'text-center', // Use text-center to center carousel
                        render: function(data, type, row) {
                            return `<div class="d-flex justify-content-center">${data}</div>`;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                order: [
                    [0, 'asc']
                ]
            });

            $(document).on('click', '.view', function() {
                var id = $(this).data('id');
                console.log(id);

            });


            $(document).on('click', '.destroy', function() {
                var id = $(this).attr('data-id');;
                // console.log(id);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "delete",
                            url: "{{ URL::to('del_profile') }}/" + id,
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json',
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        });

                    }
                });
            });
        });
    </script>
    <script>
        Dropzone.autoDiscover = false;

        var images = [];

        var myDropzone = new Dropzone(".dropzone", {
            init: function() {
                myDropzone = this;

                $.each(images, function(key, value) {
                    var mockFile = {
                        name: value.name,
                        size: value.filesize
                    };

                    myDropzone.emit("addedfile", mockFile);
                    myDropzone.emit("thumbnail", mockFile, value.path);
                    myDropzone.emit("complete", mockFile);

                });

                this.on("success", function(file, responseText) {
                    console.log(responseText);
                    $('#crudModal').modal('hide');
                    myDropzone.removeAllFiles();
                    table.ajax.reload(null, false);
                });
            },
            autoProcessQueue: false,
            parallelUploads: 4,
            paramName: "files",
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
        });

        $('#uploadFile').click(function() {
            myDropzone.processQueue({
                success: function(files, response) {
                    console.log(response);
                }
            });
        });
    </script>
@endpush
