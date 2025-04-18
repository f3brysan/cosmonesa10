@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>
        <style>.dz-filename {
            visibility: hidden;
        }

        .dz-size {
            visibility: hidden;
        }

        .dz-error-message {
            visibility: hidden;
        }
    </style>
    </style>
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
                        <li class="breadcrumb-item active">Ubah Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}
        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Ubah Data {{ $product->name }}</h5>
                    </div>
                    <form action="{{ URL('back/product/store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ old('name', $product->name) }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                                <select name="category_id" id="category_id" class="form-control js-example-basic-single"
                                    required>
                                    <option value="">Silahkan Pilih</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                            {{ ucfirst($item->name) }}</option>
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
                                    value="{{ old('price', $product->price) }}" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Kuota</label>
                                <input type="numeric" class="form-control numeric" id="quota" name="quota" required
                                    value="{{ old('quota', $product->stock) }}" max="10000" />
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Bobot <code>*(Dalam
                                        Gram)</code></label>
                                <input type="numeric" class="form-control numeric" id="weight" name="weight" required
                                    value="{{ old('weight', $product->weight) }}" max="10000" />
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="btn btn-primary float-end m-1">Simpan</button>
                                <a href="{{ URL::to('back/product') }}"
                                    class="btn btn-secondary float-end mb-6 m-1">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>Gambar Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 mb-6">
                            <a href="javascript:void(0);" id="tambah-btn" class="btn btn-primary"><i
                                    class="icon-base bx bx-plus me-1"></i> Tambah</a>
                        </div>
                        <div class="mb-4">
                            <table id="myTable" class="datatables-basic table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center">Gambar</th>
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
                <div class="modal-body">
                    <form action="{{ URL('back/product/store-images') }}" method="post"
                        enctype="multipart/form-data" class="dropzone" id="image-upload">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ Crypt::encrypt($product->id) }}">                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="uploadFile" class="btn btn-primary">Upload Images</button>
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

    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2({
                theme: 'bootstrap-5',
            });

            $("#summernote").summernote({
                height: 200,
            });
            var htmlString = '{!! $product->description !!}';
            $("#summernote").summernote("code", htmlString);

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

           table = $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ URL::to('back/product/images/' . Crypt::encrypt($product->id)) }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'image',
                        name: 'image',
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

            $("#tambah-btn").click(function(e) {
                e.preventDefault();
                $('#crudModalLabel').html('Tambah Gambar');
                $('#save-btn').html('Simpan');
                $('#crudForm').trigger("reset");
                $('#crudModal').modal('show');

            });

            $(document).on('click', '.destroy', function () {
                var id = $(this).data('id');
                console.log(id);
            });
        });
    </script>
    <script>
        Dropzone.autoDiscover = false;

        var images = [];

        var myDropzone = new Dropzone(".dropzone", {
            init: function() {
                myDropzone = this;

                $.each(images, function(key, value) {
                    var mockFile = {
                        name: value.name,
                        size: value.filesize
                    };

                    myDropzone.emit("addedfile", mockFile);
                    myDropzone.emit("thumbnail", mockFile, value.path);
                    myDropzone.emit("complete", mockFile);

                });

                this.on("success", function(file, responseText) {
                    console.log(responseText);
                    $('#crudModal').modal('hide');
                    myDropzone.removeAllFiles();
                    table.ajax.reload(null, false);
                });
            },
            autoProcessQueue: false,
            paramName: "files",
            uploadMultiple: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
        });

        $('#uploadFile').click(function() {
            myDropzone.processQueue({
                success: function(files, response) {
                    console.log(response);
                }
            });
        });
    </script>
@endpush
