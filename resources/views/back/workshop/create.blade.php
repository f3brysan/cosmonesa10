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
                        <li class="breadcrumb-item active">Data Baru</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Workshop dan Seminar Baru</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                value="{{ old('title') }}" />
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                            <textarea class="form-control" id="summernote" id="detail" name="detail" rows="10">{{ old('detail') }}</textarea>
                        </div>
                        <div class="row mb-4">
                            <p><b>Tanggal Pendaftaran</b></p>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="register_date_start"
                                    name="register_date_start" required value="{{ old('register_date_start') }}" />
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="register_date_end" name="register_date_end"
                                    required value="{{ old('register_date_end') }}" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal Event</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required
                                value="{{ old('event_date') }}" />
                        </div>
                        <div class="mb-4">
                            <div class="col-md-12">
                                <img id="preview-image-before-upload" src="https://placehold.co/1200x800" alt="preview image"
                                    style="max-height: 250px;">
                            </div>
                            <div class="col-md-12">
                                <label class="mt-2">Event Banner</label>
                                <input type="file" name="image" placeholder="Choose image" id="image"
                                    accept="image/*" class="form-control">
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
        });
    </script>
@endpush
