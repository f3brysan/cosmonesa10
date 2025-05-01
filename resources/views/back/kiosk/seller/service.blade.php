@extends('back.layouts.master')
@section('title', 'Kiosk Seller Daftar Jasa')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.bootstrap5.css">
@endpush

@section('content')
    @include('back.kiosk.seller.head')

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!-- Profile -->
                <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class="icon-base bx bxs-user-detail icon-lg text-body me-4"></i>Daftar Jasa</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-sm btn-primary mb-4" id="add-jasa">Tambah Jasa</button>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Jasa</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->category->name }}</td>
                                            <td>{{ number_format($service->price, 0, '.', '.') }}</td>
                                            <td><a href="javascript:void(0);" class="btn btn-sm btn-info">Edit"></a></td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/ Profile Timeline -->
            </div>
        </div>
    </div>

    <!-- Large Modal -->
    <div class="modal fade" id="modalTambahJasa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Perbarui Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahJasa">
                        <div class="col-md-12 mb-6">
                            <label for="nameLarge" class="form-label">Nama Jasa</label>
                            <input type="text" id="nameLarge" name="name" class="form-control" placeholder="Enter Name"
                                value="{{ $user->name ?? '' }}" required />
                        </div>
                    </form>
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


        });        

        function editProfile() {
            $.get("{{ URL::to('back/user/settings/profile/edit') }}",
                function(data) {
                    $('#profileModal').modal('show');
                    $('#profileForm').html(data);
                });
        }
    </script>
@endpush
