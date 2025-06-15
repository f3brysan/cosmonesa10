@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
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
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('back/event') }}">Event</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $event->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card h-100">
                    <img class="card-img-top mt-5"
                        src="{{ asset('storage/' . $event->picture) ?? 'https://via.placeholder.com/150' }}"
                        style="max-width: 100%; display: block; margin: auto;" alt="Banner {{ $event->title }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td><b>Jenis Acara</b></td>
                                <td><span class="badge bg-info">{{ ucfirst($event->eventtype->name) }}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Event</b></td>
                                <td>
                                    @php
                                        $date = Carbon\Carbon::parse($event->event_date);
                                        echo $date->translatedFormat('l, d F Y');
                                    @endphp
                                </td>
                            </tr>
                            <tr>
                                <td><b>HTM</b></td>
                                <td>Rp {{ number_format($event->price, 2) }}</td>
                            </tr>
                            <tr>
                                <td><b>Kuota</b></td>
                                <td>{{ $event->quota }} Kursi</td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td>
                                    @php
                                        $status = true;

                                        $status = $event->event_date <= Carbon\Carbon::now() ? false : $status;

                                        if ($status == true) {
                                            $status = $event->quota < 1 ? false : true;
                                        }

                                        if ($status == true) {
                                            $status = $event->end_date <= Carbon\Carbon::now() ? false : true;
                                        }
                                    @endphp

                                    {!! $status == true
                                        ? '<span class="badge bg-success">Tersedia</span>'
                                        : '<span class="badge bg-danger">Tidak tersedia</span>' !!}
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: justify; text-justify: inter-word;">
                            <p class="card-text">{!! $event->description !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Peserta</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No Register</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
                    url: "{{ URL::to('back/event/participants/'.$event->id) }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'name',
                        name: 'name',
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
            });
        });
    </script>
@endpush
