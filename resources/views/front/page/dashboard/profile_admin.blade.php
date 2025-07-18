@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">



    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
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
                        <input type="text" name="img_path" class="form-control mb-2" placeholder="Image Path" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
    <!-- JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                dom: 'Bfrtip', // B = Buttons, f = filter, r = processing, t = table, i = info, p = pagination
                buttons: [{
                    text: '➕ Add Item',
                    className: 'btn btn-success',
                    action: function() {
                        $('#addItemModal').modal('show'); // Trigger your modal or form
                    }
                }],
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
                var id = $(this).data('id');
                console.log(id);
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
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
