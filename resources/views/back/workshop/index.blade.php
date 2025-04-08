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
                        <li class="breadcrumb-item active">Daftar Workshop & Seminar</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Workshop & Seminar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-6">
                                <a href="{{ URL::to('back/workshop/create') }}" class="btn btn-primary"><i class="icon-base bx bx-plus me-1"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-datatable">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Waktu Daftar</th>
                                        <th class="text-center">Tanggal Acara</th>
                                        <th class="text-center">HTM</th>
                                        <th class="text-center">Kuota</th>
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
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ URL::to('back/workshop') }}", 
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'register',
                        name: 'register',
                        className: 'text-center'
                    },
                    {
                        data: 'event_date',
                        name: 'event_date',
                        className: 'text-center'
                    },                    
                    {
                        data: 'quota',
                        name: 'quota',
                        className: 'text-end'
                    },                    
                    {
                        data: 'price',
                        name: 'price',
                        className: 'text-end',
                        render: $.fn.dataTable.render.number('.', ',', 2, 'Rp '),
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
