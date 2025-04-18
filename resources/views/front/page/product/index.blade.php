@extends('front.layouts.main')
@section('title', 'Product Shop')
@section('body')

<style>
     .frame {
      width: 100%;              /* responsive width */
      max-width: 1280px;        /* limit max size */
      aspect-ratio: 1280 / 780; /* force 1280:780 aspect ratio */
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;        /* crop top/bottom to fit */
      object-position: center;  /* center the image */
      display: block;
    }
</style>
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend/') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Products</h2>
                    <p class="breadcrumbs"><a href="{{ URL::to('/') }}">Home</a><span>/</span>Products</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="{{ asset('frontend/') }}/images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->

    <!-- Begin:: Products Section -->
    <section class="shopPage">
        <div class="container">
            <div class="row shop_sort_count_row">
                <div class="col-md-7">
                    <p class="woocommerce-result-count">Showing 1–12 of 36 results</p>
                </div>
                <div class="col-md-5 text-right">
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)                    
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <div class="frame">
                                <img src="{{ !empty($productImage[$product->id]) ? asset('storage/' . $productImage[$product->id]->filename) : 'https://picsum.photos/1280/780/?blur'}}" alt=""/>
                            </div>
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                @if ($product->stock < 1)                                    
                                <span class="badge badge-info">Out of Stock</span>                                
                                @endif
                            </div>
                        </div>
                        <div class="pi_content">
                            <p>{{ $product->category->name }}</p>
                            <h3><a href="{{ '/check' }}">{{ $product->name }}</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">Rp</span>{{ number_format($product->price, 0, '.', '.') }}</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>                
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="make_pagination text-center">
                        <span class="current">1</span>
                        <a href="shop.html">2</a>
                        <a href="shop.html">3</a>
                        <a class="next" href="shop.html"><i class="icofont-simple-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Products Section -->

@endsection
@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
