@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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
                        <li class="breadcrumb-item active">Carousel</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Carousel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-6">
                                <a href="javascript:void(0)" class="btn btn-primary" id="addCarousel"><i
                                        class="icon-base bx bx-plus me-1"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-datatable">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Gambar</th>
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

    {{-- Modal --}}
    <div class="modal fade" id="addCarouselModal" tabindex="-1" aria-labelledby="addCarouselModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselModalLabel">Tambah Carousel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL::to('back/carousel/upload') }}" class="dropzone" id="carouselDropzone">
                        <div class="dz-message">
                            <div class="icon">
                                <i class="bx bx-upload"></i>
                            </div>
                            <h4>Drag and drop files here or click to upload</h4>
                            <span class="text-muted">Upload carousel images here</span>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveCarousel">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ URL::to('back/carousel') }}",
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'path',
                        name: 'path',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ],
            });

            $(document).on('click', '#addCarousel', function () {
                $('#addCarouselModal').modal('show');
            });

            $(document).on('click', '.destroy', function () {
                var id = $(this).data('id');
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
                            url: "{{ URL::to('back/carousel/destroy') }}",
                            type: 'POST',
                            data: { id: id, _token: "{{ csrf_token() }}" },
                            success: function (response) {
                                if (response.status == 'success') {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    });
                                    $('#myTable').DataTable().ajax.reload();
                                }
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Cancelled",
                            text: "Your file is safe",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
    <script>
        Dropzone.autoDiscover = false;

        // Check if Dropzone is already attached to prevent duplicate initialization
        var myDropzone;

        // Initialize Dropzone only when modal is shown
        $(document).on('show.bs.modal', '#addCarouselModal', function () {
            // Destroy existing Dropzone instance if it exists
            if (myDropzone) {
                myDropzone.destroy();
            }

            // Create new Dropzone instance with autoProcessQueue: false
            myDropzone = new Dropzone("#carouselDropzone", {
                url: "{{ URL::to('back/carousel/upload') }}",
                paramName: "file",
                maxFilesize: 50000, // MB
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                autoProcessQueue: false, // Don't upload automatically
                uploadMultiple: true, // Allow multiple file uploads
                parallelUploads: 10, // Upload multiple files simultaneously
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (file, response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            title: "Success!",
                            text: "File uploaded successfully",
                            icon: "success"
                        });
                        $('#myTable').DataTable().ajax.reload();
                        $('#addCarouselModal').modal('hide');
                        $('#carouselDropzone').reset();
                        $('#saveCarousel').prop('disabled', false).html('Save');
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.message || "Upload failed",
                            icon: "error"
                        });
                    }
                },
                error: function (file, errorMessage) {
                    Swal.fire({
                        title: "Error!",
                        text: "Upload failed: " + errorMessage,
                        icon: "error"
                    });
                }
            });
        });

        // Handle save button click to upload files
        $(document).on('click', '#saveCarousel', function () {
            if (myDropzone && myDropzone.getQueuedFiles().length > 0) {
                // Show loading state
                $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Saving...');

                // Process all queued files
                myDropzone.processQueue();
            } else {
                Swal.fire({
                    title: "Warning!",
                    text: "Please select at least one image to upload",
                    icon: "warning"
                });
            }
        });

    </script>
@endpush