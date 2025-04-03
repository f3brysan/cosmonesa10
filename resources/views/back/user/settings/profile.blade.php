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
                @if (empty($profile))
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading"><i class="fa fa-triangle-exclamation"></i> Oops !</h4>
                        <p>Waduuuhh, sepertinya biodata Anda belum lengkap, silahkan lengkapi biodata Anda terlebih dahulu.
                        </p>
                    </div>
                @endif
                <div class="card mb-6">
                    <div class="user-profile-header-banner mb-4">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                        <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                            @php
                                $namePictureAPI = str_replace(' ', '+', $user->name);
                            @endphp
                            <img src="https://ui-avatars.com/api/?name={{ $namePictureAPI }}&background=random&size=200"
                                alt="user image" class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-7">{{ $user->name }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                        <li class="list-inline-item">
                                            @foreach (auth()->user()->getRoleNames() as $item)
                                                <i class="icon-base fa fa-user me-2 align-top"></i><span
                                                    class="fw-medium">{{ ucfirst($item) }}</span>
                                            @endforeach
                                        </li>
                                        <li class="list-inline-item"><i
                                                class="icon-base bx bx-calendar me-2 align-top"></i><span class="fw-medium">
                                                Bergabung {{ $user->created_at->diffForHumans() }}</span></li>
                                    </ul>
                                </div>
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
                            <li class="d-flex align-items-center mb-4"><span class="fw-medium mx-2">Nama :</span>
                                <span>{{ $user->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Timeline -->
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
    </script>
@endpush
