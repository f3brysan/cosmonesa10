@extends('back.layouts.master')
@section('title', 'Transaction List')

@push('css')
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
                        <li class="breadcrumb-item active">Transaction List</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Transaction List</h5>
                    </div>
                    <div class="card-body">                        
                        <div class="card-datatable">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">No Invoice</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center" style="width: 50%">Description</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Total Paid</th>
                                        <th class="text-center">Payment Status</th>
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

    <!-- CRUD Modal -->
    <div class="modal fade" id="crudModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="crudForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
                        <button type="submit" class="btn btn-primary" id="save-btn">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            table = $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ URL::to('back/transaction-history') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'code',
                        name: 'code',
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'description',
                        name: 'description',
                    },
                    {
                        data: 'type',
                        name: 'type',
                        className: 'text-center'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        className: 'text-end',
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
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
                order: [
                    [0, 'asc']
                ]
            });

            $("#tambah-btn").click(function() {
                $('#crudForm').trigger("reset");
                $("#crudModal").modal('show');
                $("#crudModalLabel").html('Tambah Kategori Produk');
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).data('id');
                $.get("{{ URL::to('back/product-categories/edit') }}/" + id,
                    function(ress) {
                        $("#name").val(ress.data.name);
                        $("#id").val(ress.data.id);
                        $("#crudModal").modal('show');
                        $("#crudModalLabel").html('Edit Kategori ' + ress.data.name);
                    });
            });

            if ($("#crudForm").length > 0) {
                $("#crudForm").validate({
                    submitHandler: function(form) {
                        var actionType = $('#save-btn').val();
                        $('#save-btn').html('Menyimpan . .');

                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/product-categories/store') }}",
                            data: $('#crudForm').serialize(),
                            dataType: 'json',
                            success: function(data) {
                                $('#crudForm').trigger("reset");
                                $('#crudModal').modal("hide");
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

            $(document).on('click', '.destroy', function() {
                var id = $(this).data('id');
                console.log(id);
                Swal.fire({
                    title: "Yakin?",
                    text: "Anda tidak akan bisa mengembalikan data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/product-categories/destroy') }}",
                            data: {
                                id: id
                            },
                            dataType: "JSON",
                            success: function(response) {
                                if (response.status == 'success') {
                                    table.ajax.reload(null, false);
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: response.message,
                                        icon: "success"
                                    });
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
