@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />    
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
                            <a href="{{ URL::to('back/product') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Data Produk Baru</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Produk Baru</h5>
                    </div>
                    <form action="{{ URL('back/product/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ old('name') }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                                <select name="category_id" id="category_id" class="form-control js-example-basic-single"
                                    required>
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == old('category_id') ? 'selected' : '' }}>{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskrispi</label>
                                <textarea class="form-control" id="summernote" name="description" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                <input type="text" class="form-control numeric" id="price" name="price" required
                                    value="{{ old('price') }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kuota</label>
                                <input type="numeric" class="form-control numeric" id="quota" name="quota" required
                                    value="{{ old('quota') }}" max="10000" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Bobot <code>*(Dalam
                                        Gram)</code></label>
                                <input type="numeric" class="form-control numeric" id="weight" name="weight" required
                                    value="{{ old('weight') }}" max="10000" />
                            </div>                           
                            <div class="mb-6">
                                <button type="submit" class="btn btn-primary float-end m-1">Simpan</button>
                                <a href="{{ URL::to('back/product') }}"
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
    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2({
                theme: 'bootstrap-5',
            });

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

            $('.numeric').mask('000.000.000.000.000', {
                reverse: true
            });
            
        });
    </script>
@endpush
