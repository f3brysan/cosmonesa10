@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
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
                        <li class="breadcrumb-item active">Daftar Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-body">
                        <table id="myTable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Role</th>
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
@endsection

@push('js')
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {

        });

        $('#myTable').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "{{ URL::to('back/master/pengguna') }}", // routing ke group.index
                type: 'GET'
            },
            columns: [{
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'role',
                    name: 'role',
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
    </script>
@endpush
