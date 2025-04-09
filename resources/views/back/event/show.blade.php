@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
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
                            <a href="{{ URL::to('back/workshop') }}">Workshop</a>
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
                        style="max-width: 100%; display: block; margin: auto;"
                        alt="Banner {{ $event->title }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <table class="table table-bordered table-hover">
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

                                    {!! $status == true ? '<span class="badge bg-success">Tersedia</span>' : '<span class="badge bg-danger">Tidak tersedia</span>' !!}
                                </td>
                            </tr>
                        </table>
                        <div style="text-align: justify; text-justify: inter-word;">
                            <p class="card-text" >{!! $event->description !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    {{-- Swal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    {{-- Mask --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#price').mask('000.000.000.000.000', {
                reverse: true
            });
        });
    </script>
@endpush
