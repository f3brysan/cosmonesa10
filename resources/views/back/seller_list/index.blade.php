@extends('back.layouts.master')
@section('title', 'Dashboard')

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
                        <li class="breadcrumb-item active">Daftar Seller</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Seller</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Kios</th>
                                        <th class="text-center">Pemilik</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Total Services</th>                                        
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
                    url: "{{ URL::to('back/service-provider-list') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'user',
                        name: 'user',
                    },
                    {
                        data: 'is_verified',
                        name: 'is_verified',
                    },
                    {
                        data: 'countServices',
                        name: 'countServices',
                    },    
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false
                    }                
                ],
                order: [
                    [0, 'asc']
                ]
            });
            

            $(document).on('click', '.approve', function() {
                var id = $(this).data('id');
                var status = $(this).data('value');

                const textStatus = status == 0 ? 'Aktif' : 'Non Aktif';
                console.log(id, status);
                Swal.fire({
                    title: "Yakin?",
                    text: "Anda akan mengubah status menjadi " + textStatus + "!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Iya, Ubah!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/service-provider-list/approve') }}",
                            data: {
                                id: id,
                                status: status
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
