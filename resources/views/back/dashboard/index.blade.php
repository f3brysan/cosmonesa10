@extends('back.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-3 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <h4><i class="icon-base bx bx-wallet text-bg-warning"></i></h4>
                                    </div>
                                </div>
                                <p class="mb-1">Income</p>
                                <h4 class="card-title mb-3">Rp {{ number_format($profit, 0, ',', '.') }} </h4>
                                <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                    + {{ number_format($profitMonth, 0, ',', '.') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-3 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <h4><i class="icon-base bx bx-user text-bg-primary"></i></h4>
                                    </div>
                                </div>
                                <p class="mb-1">Service Seller</p>
                                <h4 class="card-title mb-3">{{ count($kiosks) }}</h4>
                                @php
                                    $monthNow = date('Y-m');
                                    $countKiosksNow = $kiosks->where('created_at', 'like', $monthNow . '%')->count();
                                @endphp
                                <small class="text-success fw-medium">
                                    @if ($countKiosksNow > 0)
                                        <i class="icon-base bx bx-up-arrow-alt"></i>
                                    @endif
                                    {{ $countKiosksNow }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-3 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <h4><i class="icon-base bx bx-shopping-bag text-bg-info"></i></h4>
                                    </div>
                                </div>
                                <p class="mb-1">Product Sold</p>
                                <h4 class="card-title mb-3">{{ $productSold->sum('qty') }}</h4>
                                @php
                                    $productSoldThisMonth = $productSold
                                        ->where('transactions.created_at', 'like', $monthNow . '%')
                                        ->sum('qty');
                                @endphp
                                <small class="text-success fw-medium">
                                    @if ($productSoldThisMonth > 0)
                                        <i class="icon-base bx bx-up-arrow-alt"></i>
                                    @endif
                                    {{ $productSoldThisMonth }}
                                </small>



                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-3 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <h4><i class="icon-base bx bx-group text-bg-danger"></i></h4>
                                    </div>
                                </div>
                                <p class="mb-1">Event Participant</p>
                                <h4 class="card-title mb-3">{{ count($kiosks) }}</h4>
                                @php
                                    $monthNow = date('Y-m');
                                    $countKiosksNow = $kiosks->where('created_at', 'like', $monthNow . '%')->count();
                                @endphp
                                <small class="text-success fw-medium">
                                    @if ($countKiosksNow > 0)
                                        <i class="icon-base bx bx-up-arrow-alt"></i>
                                    @endif
                                    {{ $countKiosksNow }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Order Statistics -->
            {{-- <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-1 me-2">Order Statistics</h5>
                            <p class="card-subtitle">42.82k Total Sales</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn text-body-secondary p-0" type="button" id="orederStatistics"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-6">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h3 class="mb-1">8,258</h3>
                                <small>Total Orders</small>
                            </div>
                            <div id="orderStatisticsChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex align-items-center mb-5">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="icon-base bx bx-mobile-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Electronic</h6>
                                        <small>Mobile, Earbuds, TV</small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">82.5k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-5">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                            class="icon-base bx bx-closet"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Fashion</h6>
                                        <small>T-shirt, Jeans, Shoes</small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">23.8k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-5">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                            class="icon-base bx bx-home-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Decor</h6>
                                        <small>Fine Art, Dining</small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">849k</h6>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-secondary"><i
                                            class="icon-base bx bx-football"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sports</h6>
                                        <small>Football, Cricket Kit</small>
                                    </div>
                                    <div class="user-progress">
                                        <h6 class="mb-0">99</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <!--/ Order Statistics -->            
        </div>
    </div>
@endsection
