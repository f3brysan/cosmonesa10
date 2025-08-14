@extends('back.layouts.master')
@section('title', 'Dashboard')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
        integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
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
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('back/event') }}">Produk</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Breadcrumb --}}

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle">{{ $product->category->name }}</h6>
                        <div id="carouselImage"></div>
                        <br>
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">Detil Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-sold">
                                <thead>
                                    <tr>
                                        <th class="text-center">No Transaksi</th>
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Pembeli</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Status</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sold as $item)
                                        <tr>
                                            <td>{{ $item->transaction->code }}</td>
                                            <td class="text-center">{{ Carbon\Carbon::parse($item->transaction->created_at)->format('d F Y H:i:s') }}</td>
                                            <td>{{ $item->transaction->user->name }}</td>
                                            <td class="text-center">{{ $item->qty }} pcs</td>
                                            <td class="text-center">{{ $item->transaction->payment_status }}</td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"
        integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            const product_id = "{{ Crypt::encrypt($product->id) }}";

            getImages(product_id);

            $('#table-sold').DataTable();
        });

        function getImages(product_id) {
            $.get("{{ URL::to('back/product/images') }}/" + product_id,
                function(data) {
                    console.log(data);
                    $('#carouselImage').html(data);
                });
        }
    </script>
@endpush
