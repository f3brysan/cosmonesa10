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
                                @php
                                    $quota = $event->quota - $countParticipants;
                                @endphp
                                <td>{{ $quota }} Kursi</td>
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
                        <div class="row mb-4">
                            <div class="col-12">
                                <button class="btn btn-primary float-end m-1" onclick="generateCertificate()" {{ empty($event->signature_picture) ? 'disabled' : '' }}>Buat
                                    Sertifikat</button>
                                <button class="btn btn-primary float-end m-1" onclick="setPDFSignature()">Set PDF</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No Register</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Hadir</th>
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

    {{-- Modal --}}
    <div class="modal fade" id="setPDFSignature" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Signature Event</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ URL::to('back/event/set-signature') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" id="event_id" value="{{ Crypt::encrypt($event->id) }}">                
                <div class="modal-body">
                    <div class="form-group">
                        <label for="siganture-name">Name Signature</label>
                        <input type="text" class="form-control" id="siganture_name" name="siganture_name" value="{{ $event->siganture_name }}">
                    </div>
                    <div class="form-group">
                        <label for="signature">Signature</label>
                        <input type="file" class="form-control" id="signature" name="signature">
                    </div>
                    @if ($event->signature_picture != null)                        
                    <div class="form-group">
                        <a href="{{ asset('storage/' . $event->signature_picture) }}" class="btn btn-sm btn-info" target="_blank">png Signature</a>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
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
                    url: "{{ URL::to('back/event/participants/' . $event->id) }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'code',
                        name: 'code',
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
                        data: 'is_attended',
                        name: 'is_attended',
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

            $(document).on('click', '.attend', function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Yang bersangkutan hadir pada event ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, approve it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/event/participants/attend') }}",
                            data: {
                                id: id
                            },
                            dataType: "JSON",
                            success: function(response) {
                                console.log(response);
                                table.ajax.reload(null, false);
                                Swal.fire({
                                    title: "Success!",
                                    text: "Yang bersangkutan hadir pada event ini!",
                                    icon: "success"
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.approve', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);

                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Validasi pembayaran yang bersangkutan.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, approve it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ URL::to('back/transaction-history/approve') }}",
                            data: {
                                id: id
                            },
                            dataType: "JSON",
                            success: function(response) {
                                console.log(response);
                                table.ajax.reload(null, false);
                                Swal.fire({
                                    title: "Success!",
                                    text: "Yang bersangkutan hadir pada event ini!",
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

        function setPDFSignature() {
            $('#setPDFSignature').modal('show');
        }
        function generateCertificate() {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Generate sertifikat peserta yang telah hadir.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, generate it!"
            }).then((result) => {
                if (result.isConfirmed) {

                }
            });
        }
    </script>
@endpush
