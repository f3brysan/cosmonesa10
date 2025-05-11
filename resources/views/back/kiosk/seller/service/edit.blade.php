@extends('back.layouts.master')
@section('title', 'Tambah Jasa Baru')

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
                            <a href="{{ URL::to('back/kiosku/service') }}">Kiosku</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Jasa</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Jasa {{ $service->name }}</h5>
                    </div>
                    <form action="{{ URL('back/kiosku/service/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $service->id }}">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nama Jasa</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ old('title', $service->name) }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Kategori Jasa</label>
                                <select name="category" id="category" class="form-control js-example-basic-single"
                                    required>
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == old('category', $service->category_id) ? 'selected' : '' }}>{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="summernote" name="detail" rows="10">{!! old('detail', $service->description) !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="price" name="price" required
                                    value="{{ old('price', number_format($service->price, 0)) }}" />
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="btn btn-primary float-end m-1">Simpan</button>
                                <a href="{{ URL::to('back/kiosku/service') }}"
                                    class="btn btn-secondary float-end mb-6 m-1">Kembali</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });

            $('#price').mask('000.000.000.000.000', {
                reverse: true
            });

            $('.js-example-basic-single').select2({
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush
