@extends('front.layouts.main')
@section('title', 'Dashboard')

@section('body')

    <!-- popup sidebar widget -->

    <!-- Begin:: Slider Section -->
    <section class="slider_03">
        <div class="rev_slider_wrapper">
            <div id="rev_slider_3" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <li data-index="rs-3048" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut"
                        data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off" data-title=""
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <img src="{{ asset('frontend/images/bg/9.jpg') }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg"
                            data-no-retina>
                        <div class="tp-caption headFont ws_nowrap" data-x="['center']" data-hoffset="['0'"
                            data-y="['middle']" data-voffset="['0']" data-fontsize="['60','55','60','45']"
                            data-fontweight="900" data-lineheight="['75','75','75','60']"
                            data-width="['470','470','470','100%']" data-height="['auto']" data-whitesapce="['normal']"
                            data-color="['#f8f8f8']" data-type="text" data-responsive_offset="off"
                            data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                            data-textAlign="['center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]"
                            data-paddingbottom="[0,0,0,250]" data-paddingleft="[0,0,0,20]">BEST HAIR CUTTING EVER
                        </div>
                    </li>
                    <li data-index="rs-3049" data-transition="random-premium" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut"
                        data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0"
                        data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <img src="{{ asset('frontend/images/bg/12.jpg') }}" alt="" data-bgposition="center center"
                            data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg"
                            data-no-retina>
                        <div class="tp-caption headFont ws_nowrap" data-x="['center']" data-hoffset="['0'"
                            data-y="['middle']" data-voffset="['0']" data-fontsize="['60','55','60','45']"
                            data-fontweight="900" data-lineheight="['75','75','75','60']"
                            data-width="['470','470','470','100%']" data-height="['auto']" data-whitesapce="['normal']"
                            data-color="['#f8f8f8']" data-type="text" data-responsive_offset="off"
                            data-frames='[{"delay":1500,"speed":500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                            data-textAlign="['center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]"
                            data-paddingbottom="[0,0,0,250]" data-paddingleft="[0,0,0,20]">WELCOME TO SERENITY
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->
    <section class="commonSection blogSection3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="{{ asset('frontend/images/icons/2.png') }}" alt="">
                        <h5 class="primaryFont">News About Our Company</h5>
                        <h2>News <span class="colorPrimary fontWeight400">Feed</span></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog_item_03">
                        <img src="{{ asset('frontend/images/blog/1.jpg') }}" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="single-blog.html">Spring is in the Air and and So Our These Amazing Spa Offers</a>
                            </h3>
                            <a class="lr_more" href="single-blog.html">
                                Learn More
                                <svg width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                    <path
                                        d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_item_03">
                        <img src="{{ asset('frontend/images/blog/2.jpg') }}" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="single-blog.html">We giving Amazing special spa and message service for vip.</a>
                            </h3>
                            <a class="lr_more" href="single-blog.html">
                                Learn More
                                <svg width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                    <path
                                        d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog_item_03">
                        <img src="{{ asset('frontend/images/blog/3.jpg') }}" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="single-blog.html">We also offer outside special spa and message catering;
                                    take-away</a></h3>
                            <a class="lr_more" href="single-blog.html">
                                Learn More
                                <svg width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                    <path
                                        d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Begin:: About Section -->
    <section class="commonSection aboutSection2">
        <div class="layer_img move_anim">
            <img src="{{ asset('frontend/images/bg/23.png') }}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6 noPaddingRight">
                    <div class="abContent">
                        <h3>About Us</h3>
                        <h2>
                            Clean cuts. <span class="fontWeight400 colorPrimary">Close shaves</span>
                        </h2>
                        <p class="leads">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                        </p>
                        <p>
                            Vivamus nec ligula et leo sodales pellentesque id sed lectus. Aliquam viverra velit sagittis
                            pharetra venenatis. Etiam ut euismod neque. Pellentesque luctus mauris nunc
                        </p>
                        <a href="service1.html" class="mo_btn mob_lg mob_shadow"><i
                                class="icofont-long-arrow-right"></i>Our Services</a>
                    </div>
                </div>
                <div class="col-xl-5  offset-xl-2 col-lg-6 col-md-6">
                    <div class="ab_thumb">
                        <img src="{{ asset('frontend/images/home_03/1.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: About Section -->

    <!-- Begin:: Service Section -->
    <div class="commonSection serviceSection3 hasBeforeDecoration">
        <div class="layer_img move_anim">
            <img src="{{ asset('frontend/images/bg/24.png') }}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="{{ asset('frontend/images/icons/2.png') }}" alt="" />
                        <h5 class="primaryFont">Welcome</h5>
                        <h2>Our <span class="colorPrimary fontWeight400">Services</span></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra<br /> maecenas accumsan lacus vel
                            facilisis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path
                                        d="M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523
                                                                  -45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98
                                                                  1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-stone"></i></div>
                            <i class="mkov-stone"></i>
                        </div>
                        <h3><a href="single-service.html">Stone spa</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 sIlg text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1572 2919 c-708 -80 -1193 -291 -1416 -614 -534 -777 474 -2293
                                                                  1524 -2292 887 1 1576 436 1644 1037 101 889 -356 1757 -949 1804 -69 5 -160
                                                                  22 -202 38 -98 37 -396 51 -601 27z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-candle"></i></div>
                            <i class="mkov-candle"></i>
                        </div>
                        <h3><a href="single-service.html">Candle Massage</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 sIlg text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="175.000000pt"
                                height="152.000000pt" viewBox="0 0 175.000000 152.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,152.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1115 2973 c-533 -182 -1118 -1037 -1091 -1597 31 -647 948 -1379
                                                                  1694 -1351 1127 43 2049 1058 1675 1845 -197 414 -1177 1090 -1581 1090 -27 0
                                                                  -102 14 -165 30 -170 44 -371 38 -532 -17z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-morter"></i></div>
                            <i class="mkov-morter"></i>
                        </div>
                        <h3><a href="single-service.html">Mortar</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1560 2919 c-1285 -156 -1790 -718 -1459 -1625 305 -836 1087 -1375
                                                                  1835 -1266 826 122 1314 467 1386 982 122 875 -341 1790 -933 1843 -65 6 -154
                                                                  24 -198 40 -97 37 -431 51 -631 26z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-bottle"></i></div>
                            <i class="mkov-bottle"></i>
                        </div>
                        <h3><a href="single-service.html">Medicine</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path
                                        d="M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523
                                                                  -45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98
                                                                  1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-spa-drop"></i></div>
                            <i class="mkov-spa-drop"></i>
                        </div>
                        <h3><a href="single-service.html">Nails Design</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1572 2919 c-708 -80 -1193 -291 -1416 -614 -534 -777 474 -2293
                                                                  1524 -2292 887 1 1576 436 1644 1037 101 889 -356 1757 -949 1804 -69 5 -160
                                                                  22 -202 38 -98 37 -396 51 -601 27z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-massage-oil"></i></div>
                            <i class="mkov-massage-oil"></i>
                        </div>
                        <h3><a href="single-service.html">Hair Cutting</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="175.000000pt"
                                height="152.000000pt" viewBox="0 0 175.000000 152.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,152.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1115 2973 c-533 -182 -1118 -1037 -1091 -1597 31 -647 948 -1379
                                                                  1694 -1351 1127 43 2049 1058 1675 1845 -197 414 -1177 1090 -1581 1090 -27 0
                                                                  -102 14 -165 30 -170 44 -371 38 -532 -17z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-span-steam"></i></div>
                            <i class="mkov-span-steam"></i>
                        </div>
                        <h3><a href="single-service.html">Hair Color</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1560 2919 c-1285 -156 -1790 -718 -1459 -1625 305 -836 1087 -1375
                                                                  1835 -1266 826 122 1314 467 1386 982 122 875 -341 1790 -933 1843 -65 6 -154
                                                                  24 -198 40 -97 37 -431 51 -631 26z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="mkov-steam"></i></div>
                            <i class="mkov-steam"></i>
                        </div>
                        <h3><a href="single-service.html">Steam Massage</a></h3>
                        <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Service Section -->



    <!-- Begin:: Feature Section -->
    <section class="commonSection featureSection">
        <div class="layer_img move_anim">
            <img src="{{ asset('frontend/images/bg/25.png') }}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xl-5 col-lg-5">
                    <div class="abContent">
                        <h2>
                            Our 10 years working <span class="fontWeight400 colorPrimary">experience</span>
                        </h2>
                        <p class="leads">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore mel ei harum appellantur disputationi
                        </p>
                    </div>
                </div>
                <div class="col-md-7 col-xl-5 offset-xl-1 col-lg-7">
                    <div class="aboutImg2 text-right">
                        <img src="{{ asset('frontend/images/home_03/2.jpg') }}" alt="Makeover">
                        <div class="shape1">
                            <img src="{{ asset('frontend/images/home_03/3.jpg') }}" alt="">
                        </div>
                        <div class="shape2">
                            <img src="{{ asset('frontend/images/home_03/4.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Feature Section -->

    <!-- Begin:: Client Section -->
    <section class="clientSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="clientSlider owl-carousel">
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/1.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/1.png') }}"
                                alt="" /></a>
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/2.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/2.png') }}"
                                alt="" /></a>
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/3.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/3.png') }}"
                                alt="" /></a>
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/4.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/4.png') }}"
                                alt="" /></a>
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/5.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/5.png') }}"
                                alt="" /></a>
                        <a href="javascript:void(0);"><img class="hover"
                                src="{{ asset('frontend/images/client_logo/1.png') }}" alt="" /><img
                                class="normal" src="{{ asset('frontend/images/client_logo/1.png') }}"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Client Section -->

    <!-- Begin:: Testimonial Section -->
    <section class="commonSection testimonialSlider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimoanial_area">
                        <div class="tw_testiSlider">
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>Design Grue</span>
                                    <p>California, USA</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>William Smith</span>
                                    <p>New York, USA</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>Mark Smith</span>
                                    <p>London, UK</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>Design Grue</span>
                                    <p>California, USA</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>William Smith</span>
                                    <p>New York, USA</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <img src="{{ asset('frontend/images/home_01/quote.png') }}" alt="" />
                                    <span></span><span></span><span></span><span></span>
                                </div>
                                <p class="quatation">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.<br>
                                    Quis ipsum suspendisse ultrices
                                </p>
                                <div class="test_author">
                                    <span>Mark Smith</span>
                                    <p>London, UK</p>
                                </div>
                            </div>
                        </div>
                        <div class="testiNav">
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t1.png') }}" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t2.png') }}" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t3.png') }}" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t1.png') }}" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t2.png') }}" alt="" />
                            </div>
                            <div class="navitem">
                                <img src="{{ asset('frontend/images/home_01/t3.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Testimonial Section -->

    <!-- Begin:: Team Section -->
    <section class="commonSection teamSection2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="{{ asset('frontend/images/icons/3.png') }}" alt="">
                        <h5 class="primaryFont">Meet With</h5>
                        <h2>Our <span class="colorPrimary fontWeight400">Team</span></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra<br> maecenas accumsan lacus vel
                            facilisis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="team_01 tm_col_4 text-center">
                        <div class="tm_thumb">
                            <img src="{{ asset('frontend/images/home_03/t1.jpg') }}" alt="" />
                            <div class="tm_social">
                                <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                                <a href="https://envato.com/"><i class="icofont-envato"></i></a>
                                <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                            </div>
                        </div>
                        <p>Founder</p>
                        <h3><a href="single-team.html">Jan Enno Einfeld</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team_01 tm_col_4 text-center">
                        <div class="tm_thumb">
                            <img src="{{ asset('frontend/images/home_03/t2.jpg') }}" alt="" />
                            <div class="tm_social">
                                <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                                <a href="https://envato.com/"><i class="icofont-envato"></i></a>
                                <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                            </div>
                        </div>
                        <p>Ceo</p>
                        <h3><a href="single-team.html">Jont Herry</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="team_01 tm_col_4 text-center">
                        <div class="tm_thumb">
                            <img src="{{ asset('frontend/images/home_03/t3.jpg') }}" alt="" />
                            <div class="tm_social">
                                <a href="https://www.facebook.com/"><i class="icofont-facebook"></i></a>
                                <a href="https://envato.com/"><i class="icofont-envato"></i></a>
                                <a href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                            </div>
                        </div>
                        <p>Managing Director</p>
                        <h3><a href="single-team.html">Georgie Haynes</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Team Section -->

    <!-- Begin:: Instagram Section -->
    <div class="my_instagram with_border ovelay">
        <a href="https://www.instagram.com/themewar/" target="_blank"><img
                src="{{ asset('frontend/images/instagram/7.jpg') }}" alt="instagram"></a>
        <a href="https://www.instagram.com/themewar/" target="_blank"><img
                src="{{ asset('frontend/images/instagram/8.jpg') }}" alt="instagram"></a>
        <a href="https://www.instagram.com/themewar/" target="_blank"><img
                src="{{ asset('frontend/images/instagram/9.jpg') }}" alt="instagram"></a>
        <a href="https://www.instagram.com/themewar/" target="_blank"><img
                src="{{ asset('frontend/images/instagram/10.jpg') }}" alt="instagram"></a>
        <a href="https://www.instagram.com/themewar/" target="_blank"><img
                src="{{ asset('frontend/images/instagram/11.jpg') }}" alt="instagram"></a>
    </div>
    <!-- End:: Instagram Section -->

    <!-- Begin:: Package Section -->
    <section class="commonSection pricingSection2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="sectionTitle text-center">
                        <img src="{{ asset('frontend/images/icons/2.png') }}" alt="">
                        <h5 class="primaryFont">Get Inspiration</h5>
                        <h2>Price <span class="colorPrimary fontWeight400">Plans</span></h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs pricingTab" id="pricingTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="cat-service nav-link active" id="spa_solution_tab" data-toggle="tab"
                                href="#spa_solution_items" role="tab" aria-controls="spa_solution_items"
                                aria-selected="true">
                                <div class="svgContainer">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                        height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                        preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)"
                                            fill="#252525" stroke="none">
                                            <path
                                                d="M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523
                                                                          -45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98
                                                                          1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z" />
                                        </g>
                                    </svg>
                                    <i class="mkov-candle"></i>
                                </div>
                                <span>SPA Solution</span>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="spa_solution_items" role="tabpanel"
                            aria-labelledby="spa_solution_tab">

                            <div class="row pt18">
                                <div class="col-lg-12 text-center">
                                    <a href="booking.html" class="mo_btn mob_lg mo_reverse"><i
                                            class="icofont-calendar"></i>Book Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="massage_items" role="tabpanel" aria-labelledby="massage_tab">

                            <div class="row pt18">
                                <div class="col-lg-12 text-center">
                                    <a href="booking.html" class="mo_btn mob_lg mo_reverse"><i
                                            class="icofont-calendar"></i>Book Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="facials_items" role="tabpanel" aria-labelledby="facials_tab">

                            <div class="row pt18">
                                <div class="col-lg-12 text-center">
                                    <a href="booking.html" class="mo_btn mob_lg mo_reverse"><i
                                            class="icofont-calendar"></i>Book Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="body_therapy_items" role="tabpanel"
                            aria-labelledby="body_therapy_tab">

                            <div class="row pt18">
                                <div class="col-lg-12 text-center">
                                    <a href="booking.html" class="mo_btn mob_lg mo_reverse"><i
                                            class="icofont-calendar"></i>Book Appointment</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="medication_items" role="tabpanel"
                            aria-labelledby="medication_tab">

                            <div class="row pt18">
                                <div class="col-lg-12 text-center">
                                    <a href="booking.html" class="mo_btn mob_lg mo_reverse"><i
                                            class="icofont-calendar"></i>Book Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Package Section -->

    <!-- Begin:: Blog Section -->

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var clicked = '';
            $.ajax({
                type: "get",
                url: "{{ URL::to('/get-service-cat') }}",
                datatype: "json",
                success: function(response) {
                    let svgPaths = [
                        "M1560 2919 c-1285 -156 -1790 -718 -1459 -1625 305 -836 1087 -1375 1835 -1266 826 122 1314 467 1386 982 122 875 -341 1790 -933 1843 -65 6 -154 24 -198 40 -97 37 -431 51 -631 26z",
                        "M1115 2973 c-533 -182 -1118 -1037 -1091 -1597 31 -647 948 -1379 1694 -1351 1127 43 2049 1058 1675 1845 -197 414 -1177 1090 -1581 1090 -27 0 -102 14 -165 30 -170 44 -371 38 -532 -17z",
                        "M1572 2919 c-708 -80 -1193 -291 -1416 -614 -534 -777 474 -2293 1524 -2292 887 1 1576 436 1644 1037 101 889 -356 1757 -949 1804 -69 5 -160 22 -202 38 -98 37 -396 51 -601 27z",
                        "M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523-45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98 1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z",
                        "M1560 2919 c-1285 -156 -1790 -718 -1459 -1625 305 -836 1087 -1375 1835 -1266 826 122 1314 467 1386 982 122 875 -341 1790 -933 1843 -65 6 -154 24 -198 40 -97 37 -431 51 -631 26z",
                        "M1115 2973 c-533 -182 -1118 -1037 -1091 -1597 31 -647 948 -1379 1694 -1351 1127 43 2049 1058 1675 1845 -197 414 -1177 1090 -1581 1090 -27 0 -102 14 -165 30 -170 44 -371 38 -532 -17z",
                        "M1572 2919 c-708 -80 -1193 -291 -1416 -614 -534 -777 474 -2293 1524 -2292 887 1 1576 436 1644 1037 101 889 -356 1757 -949 1804 -69 5 -160 22 -202 38 -98 37 -396 51 -601 27z",
                        "M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523 -45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98 1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z"
                    ];

                    let icons = [
                        "mkov-stone",
                        "mkov-candle",
                        "mkov-morter",
                        "mkov-bottle",
                        "mkov-spa-drop",
                        "mkov-massage-oil",
                        "mkov-span-steam",
                        "mkov-steam"
                    ];
                    let serviceHtml = '';
                    response.data.forEach(service => {
                        let randomPath = svgPaths[Math.floor(Math.random() * svgPaths.length)];
                        let randomIcon = icons[Math.floor(Math.random() * icons.length)];
                        let id_tab = service.name.replace(/[^a-zA-Z0-9]/g, "_");
                        serviceHtml += `
                        <li class="nav-item" role="presentation">
                        <a class="cat-service nav-link ${clicked == service.id ? 'active' : ''}" data-id="${service.id}" id="${id_tab}" data-toggle="tab"
                                href="#spa_solution_items" role="tab" aria-controls="${id_tab}"
                                aria-selected="true">
                                <div class="svgContainer">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                        height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                        preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)"
                                            fill="#252525" stroke="none">
                                            <path d="${randomPath}" />
                                        </g>
                                    </svg>
                                    <i class="${randomIcon}"></i>
                                </div>
                                <span>${service.name}</span>
                            </a>
                        </li>
                        `;

                    });



                    $('#pricingTab').html(serviceHtml);
                }
            });


            $(document).on('click', '.cat-service', function(e) {
                e.preventDefault();
                let serviceId = $(this).data("id"); // Get ID from data attribute
                $.ajax({
                    url: "/get-service",
                    type: "POST",
                    data: {
                        id: serviceId // Pass the ID
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endpush
