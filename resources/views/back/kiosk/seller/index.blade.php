@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
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
                        <li class="breadcrumb-item active">Profil Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <!-- Header -->
        <div class="row">
            <div class="col-12">
              <div class="card mb-6">
                <div class="user-profile-header-banner">
                  <img src="https://picsum.photos/2252/500" alt="Banner image" class="rounded-top" style="block-size: 250px; inline-size: 100%; object-fit: cover;" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">                  
                  <div class="flex-grow-1 mt-3 mt-lg-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                      <div class="user-profile-info">
                        <h4 class="mb-2 mt-lg-7">{{ $kiosk->name ?? 'Unamed Kios' }}</h4>
                        <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                          <li class="list-inline-item"><i class="icon-base bx bx-palette me-2 align-top"></i><span class="fw-medium">081234567</span></li>
                          <li class="list-inline-item"><i class="icon-base bx bx-map me-2 align-top"></i><span class="fw-medium">Alamat</span></li>
                          <li class="list-inline-item"><i class="icon-base bx bx-calendar me-2 align-top"></i><span class="fw-medium"> Since {{ Carbon\Carbon::parse($kiosk->created_at)->format('d F Y') }}</span></li>
                          @if ($kiosk->is_verifed == 1)
                          <li class="list-inline-item"><i class="icon-base bx bx-badge-check me-2 align-top text-info"></i><span class="fw-medium label bg-label-info">Terverifikasi</span></li>
                          @else
                          <li class="list-inline-item"><i class="icon-base bx bx-x-circle me-2 align-top text-warning"></i><span class="fw-medium label bg-label-warning">Belum Terverifikasi</span></li>
                          @endif
                        </ul>
                      </div>
                      <a href="javascript:void(0)" class="btn btn-primary mb-1"> <i class="icon-base bx bx-cog icon-sm me-2"></i>Edit </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ URL::to('back/user/settings') }}"><i
                                    class="icon-base bx bx-user icon-sm me-1_5"></i> Profile</a>
                        </li>
                        @role('seller')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('back/user/my-store') }}"><i
                                        class="icon-base bx bxs-store-alt icon-sm me-1_5"></i> Lapak Ku</a>
                            </li>
                        @endrole
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-12">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-body-secondary small"><b>Saldo</b></small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bxs-wallet-alt"></i><span
                                    class="fw-medium mx-2">Saldo:</span> <span>Rp 9999</span></li>
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Profile -->
                <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class="icon-base bx bxs-user-detail icon-lg text-body me-4"></i>Profile</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Nama :</span>
                                <span>{{ $user->name }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Tanggal Lahir :</span>
                                <span>{{ $profile->dob ?? 'Belum Terisi' }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Jenis Kelamin :</span>
                                <span>
                                    @if (!empty($profile->gender))
                                        {{ $profile->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    @else
                                        Belum Terisi
                                    @endif
                                </span>
                            </li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Nomor HP :</span>
                                <span>{{ $profile->hp ?? 'Belum Terisi' }}</span>
                            </li>
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Email :</span>
                                <span>{{ $user->email }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="javascript:void(0);" class="btn btn-primary float-end" onclick="editProfile()"><i
                                class="icon-base bx bx-edit-alt icon-sm"></i> Edit Profile</a>
                    </div>
                </div>
                <!--/ Profile Timeline -->
            </div>
        </div>
    </div>

    <!-- Large Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Perbarui Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="profileForm"></div>
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
