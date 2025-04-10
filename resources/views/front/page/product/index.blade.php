@extends('front.layouts.main')
@section('title', 'Product Shop')
@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend/') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Products</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Products</p>
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
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/2.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                <p class="justin">New</p>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Nautral Oliver</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>87.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/3.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                <p class="outofstock">Out of Stock</p>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Mackup Creams</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>65.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/4.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                <p class="bestseller">Sale</p>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Beauty Harbal Soap</a></h3>
                            <div class="product_price clearfix">
                                <span class="price">
                                    <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>105.00</bdi></span></del>
                                    <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99.00</bdi></span></ins>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/5.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                <p class="featured">Featured</p>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Cream & Brush</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>73.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/6.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                            <div class="prLabels">
                                <p class="bestseller">Sale</p>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Makeover Hair Spa</a></h3>
                            <div class="product_price clearfix">
                                <span class="price">
                                    <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>59.00</bdi></span></del>
                                    <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>49.00</bdi></span></ins>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/7.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Face Makeup Collection</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>33.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/8.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Special Feawash</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>19.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product_item text-center">
                        <div class="pi_thumb">
                            <img src="{{ asset('frontend/') }}/images/product/9.jpg" alt="" />
                            <div class="pi_01_actions">
                                <a href="{{ '/cart' }}"><i class="icofont-cart-alt"></i></a>
                                <a href="{{ '/check' }}"><i class="icofont-eye"></i></a>
                            </div>
                        </div>
                        <div class="pi_content">
                            <p><a href="shop.html">Cosmetics</a></p>
                            <h3><a href="{{ '/check' }}">Face Makeup Brush</a></h3>
                            <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>59.00</bdi></span></span>
                            </div>
                        </div>
                    </div>
                </div>
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
