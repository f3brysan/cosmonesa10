@extends('front.layouts.main')
@section('title', 'Product Shop')
@section('body')

    <!-- popup sidebar widget -->
    <section class="popup_sidebar_sec">
        <div class="popup_sidebar_overlay"></div>
        <div class="widget_area">
            <a href="javascript:void(0);" class="widget_closer"><i class="icofont-close-line"></i></a>
            <div class="center_align">
                <div class="about_widget_area">
                    <div class="wd_logo">
                        <a href="index.html"><img src="{{ asset('frontend/') }}/images/logo.png" alt="makeover" /></a>
                    </div>
                    <p>
                        We take a bottom-line approach to each project. Our clients consistently see increased traffic,
                        enhanced brand loyalty and new leads thanks to our work.
                    </p>
                    <div class="icon_box_04">
                        <i class="noun-noun_call_1624888"></i>
                        <h4>Call Us</h4>
                        <p>1.800.321.9876</p>
                    </div>
                    <div class="icon_box_04">
                        <i class="noun-noun_Email_485891"></i>
                        <h4>Write us</h4>
                        <p>hello@makeover.com</p>
                    </div>
                    <div class="icon_box_04">
                        <i class="noun-noun_Address_1271842"></i>
                        <h4>Address</h4>
                        <p>70 Greenview Ave. Temple Hills,<br> MD 20748, USA</p>
                    </div>
                    <div class="social_item">
                        <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                        <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                        <a href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                        <a href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popup sidebar widget -->

    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend/') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Product Details</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Product Details</p>
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

    <!-- Begin:: Single Products Section -->
    <section class="singleProduct">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product_gallery">
                        <ul id="product_gallery" class="gallery_sliders cS-hidden">
                            <li data-thumb="{{ asset('frontend/') }}/images/product/ss1.jpg">
                                <div class="pg_item"><img src="{{ asset('frontend/') }}/images/product/s1.jpg"
                                        alt="" /></div>
                            </li>
                            <li data-thumb="{{ asset('frontend/') }}/images/product/ss2.jpg">
                                <div class="pg_item"><img src="{{ asset('frontend/') }}/images/product/s2.jpg"
                                        alt="" /></div>
                            </li>
                            <li data-thumb="{{ asset('frontend/') }}/images/product/ss3.jpg">
                                <div class="pg_item"><img src="{{ asset('frontend/') }}/images/product/s3.jpg"
                                        alt="" /></div>
                            </li>
                            <li data-thumb="{{ asset('frontend/') }}/images/product/ss4.jpg">
                                <div class="pg_item"><img src="{{ asset('frontend/') }}/images/product/s4.jpg"
                                        alt="" /></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product_details">
                        <h3>Cream & Brush</h3>
                        <div class="product_price clearfix">
                            <span class="price">
                                <del><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>105.00</bdi></span></del>
                                <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">$</span>99.00</bdi></span></ins>
                            </span>
                        </div>
                        <div class="woocommerce-product-rating">
                            <div class="star-rating" role="img" aria-label="Rated 4.50 out of 5">
                                <span class="w80">
                                    Rated
                                    <strong class="rating">4.50</strong>
                                    out of 5 based on
                                    <span class="rating">2</span>
                                    customer ratings
                                </span>
                            </div>
                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">2</span>
                                customer reviews)</a>
                        </div>
                        <div class="pd_excrpt">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                                Quis ipsum suspendisse ultrices gravida. Risus commodo viverra mae-cenas accumsan lacus vel
                                facilisis.
                            </p>
                        </div>
                        <div class="cart_quantity clearfix">
                            <div class="quantity quantityd clearfix">
                                <button type="button" class="minus qtyBtn btnMinus">-</button>
                                <input type="number" class="carqty input-text qty text" name="quantity" value="1">
                                <button type="button" class="plus qtyBtn btnPlus">+</button>
                            </div>
                            {{-- <button type="submit" class="mo_btn"><i class="icofont-cart-alt"></i>Add to cart</button> --}}
                            <a href="{{ '/cart' }}" type="submit" class="mo_btn"><i class="icofont-cart-alt"></i>Add
                                to cart</a>
                        </div>
                        <div class="pro_meta clearfix">
                            <h5>Info</h5>
                            <div class="mtItem">
                                SKU: 01
                            </div>
                            <div class="mtItem">
                                Category: <a href="shop.html">Design</a>
                            </div>
                            <div class="mtItem">
                                Tags: <a href="shop.html">Design</a>, <a href="shop.html">Ideas</a>, <a
                                    href="shop.html">Innovative</a>, <a href="shop.html">New</a>
                            </div>
                        </div>
                        <div class="pro_m_social">
                            <h5>Share:</h5>
                            <a target="_blank" href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                            <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                            <a target="_blank" href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_tabarea">
                        <ul class="nav nav-tabs productTabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active" id="description-tab" data-toggle="tab" href="#description"
                                    role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="additionalinfo-tab" data-toggle="tab" href="#additionalinfo" role="tab"
                                    aria-controls="additionalinfo" aria-selected="false">Additional Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                    aria-controls="reviews" aria-selected="false">Review (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="pdtci_content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
                                        perspiciatis unde omnis iste natus error sit
                                        voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                        illo inventore veritatis et quasi architecto
                                        beatae vitae dicta sunt explicabo.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="additionalinfo" role="tabpanel"
                                aria-labelledby="additionalinfo-tab">
                                <div class="adinfo">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Weight:</th>
                                                <td>0.15 kg</td>
                                            </tr>
                                            <tr>
                                                <th>Dim:</th>
                                                <td>15 x 15 x 10 cm</td>
                                            </tr>
                                            <tr>
                                                <th>Color:</th>
                                                <td>Black, Green, Mixed, Red, White</td>
                                            </tr>
                                            <tr>
                                                <th>Size:</th>
                                                <td>Extra Large, Extra Small, Medium, Small</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="pdtci_content">
                                    <div class="comment_area">
                                        <div class="sic_comments">
                                            <h3 class="sicc_title">03 Reviews</h3>
                                            <ol class="sicc_list">
                                                <li>
                                                    <article class="single_comment productComent">
                                                        <img src="{{ asset('frontend/') }}/images/blog/a1.jpg"
                                                            alt="">
                                                        <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a>
                                                        </h4>
                                                        <span class="cm_date">7 months ago</span>
                                                        <div class="sc_content">
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and type
                                                                setting industry. Lorem Ipsum has been the
                                                                industry's sincethe 1500s. When an unknown printer took a
                                                                galley of type and scrambled it to make a
                                                                type specimen book.
                                                            </p>
                                                        </div>
                                                        <div class="woocommerce-product-rating">
                                                            <div class="star-rating" role="img"
                                                                aria-label="Rated 4.50 out of 5">
                                                                <span class="w100">
                                                                    Rated <strong class="rating">5.00</strong> out of 5
                                                                    based on
                                                                    <span class="rating">1</span> customer ratings
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="single_comment productComent">
                                                        <img src="{{ asset('frontend/') }}/images/blog/a2.jpg"
                                                            alt="">
                                                        <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a>
                                                        </h4>
                                                        <span class="cm_date">7 months ago</span>
                                                        <div class="sc_content">
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and type
                                                                setting industry. Lorem Ipsum has been the
                                                                industry's sincethe 1500s. When an unknown printer took a
                                                                galley of type and scrambled it to make a
                                                                type specimen book.
                                                            </p>
                                                        </div>
                                                        <div class="woocommerce-product-rating">
                                                            <div class="star-rating" role="img"
                                                                aria-label="Rated 4.50 out of 5">
                                                                <span class="w80">
                                                                    Rated <strong class="rating">5.00</strong> out of 5
                                                                    based on
                                                                    <span class="rating">1</span> customer ratings
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                                <li>
                                                    <article class="single_comment productComent">
                                                        <img src="{{ asset('frontend/') }}/images/blog/a3.jpg"
                                                            alt="">
                                                        <h4 class="cm_author"><a href="javascript:void(0);">Amy Burton</a>
                                                        </h4>
                                                        <span class="cm_date">7 months ago</span>
                                                        <div class="sc_content">
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and type
                                                                setting industry. Lorem Ipsum has been the
                                                                industry's sincethe 1500s. When an unknown printer took a
                                                                galley of type and scrambled it to make a
                                                                type specimen book.
                                                            </p>
                                                        </div>
                                                        <div class="woocommerce-product-rating">
                                                            <div class="star-rating" role="img"
                                                                aria-label="Rated 4.50 out of 5">
                                                                <span class="w40">
                                                                    Rated <strong class="rating">5.00</strong> out of 5
                                                                    based on
                                                                    <span class="rating">1</span> customer ratings
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="commentForm productCommentForm">
                                            <h3 class="sicc_title">Add a Review</h3>
                                            <form action="#" method="post" class="row">
                                                <div class="col-md-12">
                                                    <textarea name="comment" placeholder="Your Comment *"></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <input placeholder="Your Name *" name="author" type="text">
                                                </div>
                                                <div class="col-md-6">
                                                    <input placeholder="Email Address *" name="email" type="email">
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="mo_btn" type="submit"><i
                                                            class="icofont-long-arrow-right"></i>Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="related_area">
                        <h2>Related Products</h2>
                        <div class="related_carousel owl-carousel">
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/2.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="justin">New</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Nautral Oliver</a></h3>
                                    <div class="product_price clearfix">
                                        <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>87.00</bdi></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/3.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="outofstock">Out of Stock</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Mackup Creams</a></h3>
                                    <div class="product_price clearfix">
                                        <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>65.00</bdi></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/4.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="bestseller">Sale</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Beauty Harbal Soap</a></h3>
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
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/5.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="featured">Featured</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Cream & Brush</a></h3>
                                    <div class="product_price clearfix">
                                        <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>73.00</bdi></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/6.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                    <div class="prLabels">
                                        <p class="bestseller">Sale</p>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Makeover Hair Spa</a></h3>
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
                            <div class="product_item text-center">
                                <div class="pi_thumb">
                                    <img src="{{ asset('frontend/') }}/images/product/7.jpg" alt="" />
                                    <div class="pi_01_actions">
                                        <a href="cart.html"><i class="icofont-cart-alt"></i></a>
                                        <a href="single-product.html"><i class="icofont-eye"></i></a>
                                    </div>
                                </div>
                                <div class="pi_content">
                                    <p><a href="shop.html">Cosmetics</a></p>
                                    <h3><a href="single-product.html">Face Makeup Collection</a></h3>
                                    <div class="product_price clearfix">
                                        <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>33.00</bdi></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Single Products Section -->

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
