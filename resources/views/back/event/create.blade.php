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
                    <form action="{{ URL('back/event/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ old('title') }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Jenis Acara</label>
                                <select name="event_type" id="event_type" class="form-control" required>
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($eventTypes as $item)
                                        <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                                <textarea class="form-control" id="summernote" name="detail" rows="10">{{ old('detail') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="price" name="price" required
                                value="{{ old('price') }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kuota</label>
                                <input type="numeric" class="form-control" id="quota" name="quota" required
                                value="{{ old('quota') }}" max="10000" />
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
                                    <input type="date" class="form-control" id="register_date_end"
                                        name="register_date_end" required value="{{ old('register_date_end') }}" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Event</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" required
                                    value="{{ old('event_date') }}" />
                            </div>
                            <div class="mb-4">
                                <div class="col-md-12">
                                    <img id="preview-image-before-upload" src="https://placehold.co/1200x800"
                                        alt="preview image" style="max-width: 100%; width: 400px;">
                                </div>
                                <div class="col-md-12">
                                    <label class="mt-2">Event Banner <code>*Maksimal 2MB dan format gambar</code></label>
                                    <input type="file" name="image" placeholder="Choose image" id="image"
                                        accept="image/*" class="form-control">
                                </div>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="btn btn-primary float-end m-1">Simpan</button>
                                <a href="{{ URL::to('back/workshop') }}" class="btn btn-secondary float-end mb-6 m-1">Kembali</a>
                            </div>
                    </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

            $('#price').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
@endpush
