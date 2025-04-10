@extends('front.layouts.main')
@section('title', 'Event & Workshop')

@section('body')

    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Events</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Events</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="{{ asset('frontend') }}/images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->

    <!-- Begin:: Blog Section -->
    <section class="blogPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/1.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">Spring is in the Air and and So Our These Amazing Spa
                                    Offers</a></h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/2.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">We giving Amazing special spa and message service for
                                    vip.</a></h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/3.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">We also offer outside special spa and message catering;
                                    take-away</a></h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/4.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">If you are going to use a you need to be sure can do
                                    it.</a></h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/5.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">Looks reasonable. The generate is therefore always.</a>
                            </h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
                    <div class="blog_item_01">
                        <img src="{{ asset('frontend') }}/images/blog/6.jpg" alt="" />
                        <div class="bp_content">
                            <span>February 18, 2017</span>
                            <h3><a href="{{ '/detail-event' }}">There are many variations spa & Saloon body massage
                                    available.</a></h3>
                            <a class="lr_more" href="{{ '/detail-event' }}">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="make_pagination text-center">
                        <span class="current">1</span>
                        <a href="blog2.html">2</a>
                        <a href="blog2.html">3</a>
                        <a class="next" href="blog2.html"><i class="icofont-simple-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Blog Section -->

@endsection
