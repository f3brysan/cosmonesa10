@extends('front.layouts.main')
@section('title', 'Appointment')

@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Service Details</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Service Details</p>
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

    <!-- Begin:: Service Details Section -->
    <div class="serviceSinglePage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ser_thumb">
                        <img src="{{ asset('frontend') }}/images/single_service/1.jpg" alt="" />
                    </div>
                    <div class="ser_content">
                        <div class="serv_meta">
                            <i class="mkov-leaf"></i>
                            <h3>Winter Ritual</h3>
                            <p>20 mins Revitalize Facial</p>
                        </div>
                        <p>
                            As part of a new partnership with Sensync, an immersive wellness company founded by Adam
                            Gazzaley, Ph.D., and Alex Theory, Ph.D.,
                            The Vessel helps guests reset their brains with a host of customized journeys: Deep Space,
                            Kairos, Ocean Cove, Zen Garden,
                            Quantum Oneness, Crystal Cave, Lost Jungle, and Floating Clouds. Designed to relax and restore
                            the mind, the experiences—Relax
                            ($75, 20 minutes), Restore ($75, 20 minutes), and Full Spectrum ($135, 40 minutes)—allow guests
                            to take a virtual journey into nature.
                            Integrating aromatherapy, sound and music therapy, vibroacoustic stimulation, visual virtual
                            reality, biofeedback and neurofeedback,
                            meditation practices, and more, The Vessel helps spa-goers improve attention, reduce stress, and
                            enhance their moods.
                        </p>
                        <p>
                            Aliquam laoreet massa vitae purus venenatis, quis egestas eros placerat. Vestibulum auctor
                            lacinia arcu, et feugiat dui lacinia non.
                            Morbi vel ex a arcu accumsan lacinia. Donec vel ex non elit consequat sagittis id tempor lectus.
                            Vivamus ornare convallis ipsum, vitae
                            tristique arcu placerat at. Proin quis felis lacus. Curabitur dictum risus non blandit rutrum.
                            Sed aliquet, mauris facilisis tempor vestibulum,
                            ex purus tempor metus, a euismod felis sapien sit amet nisi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="spa_thumb">
                        <img src="{{ asset('frontend') }}/images/single_service/2.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="spa_content">
                        <h3>Spa Center</h3>
                        <p>
                            Lorem ipsum dolor sit amet, sumo iudicabit eu has, eligendi pertinax iracun-dia has id, no vis
                            utamur vivendum.
                            Eos ubique tritani fierent ut, eum legimus intellegam ex, eu mel modus dolore iriure. Simul per
                            omittantur voluptatibus viderer vero nam.
                        </p>
                        <a href="booking.html" class="mo_btn mob_lg"><i class="icofont-long-arrow-right"></i>Book Now</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="item spaTestimonial">
                        <div class="quote">
                            <img src="{{ asset('frontend') }}/images/home_01/quote.png" alt="">
                            <span></span><span></span><span></span><span></span>
                        </div>
                        <p class="quatation">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.<br>
                            Quis ipsum suspendisse ultrices
                        </p>
                        <div class="test_author">
                            <span>Design Grue</span>
                            <p>California, USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Service Details Section -->

    <!-- Begin:: Video Section -->
    <div class="video_banner videoWrap">
        <img src="{{ asset('frontend') }}/images/single_service/3.jpg" alt="">
        <a href="https://player.vimeo.com/video/23534361" class="popup_video"><i class="icofont-play"></i></a>
    </div>
    <!-- End:: Video Section -->

    <!-- Begin:: Gallery Section -->
    <div class="my_gallery">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a class="gallerItem" href="single-gallery.html">
                        <img src="{{ asset('frontend') }}/images/gallery/1.jpg" alt="gallery">
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a class="gallerItem" href="single-gallery.html">
                        <img src="{{ asset('frontend') }}/images/gallery/2.jpg" alt="gallery">
                    </a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <a class="gallerItem" href="single-gallery.html">
                                <img src="{{ asset('frontend') }}/images/gallery/3.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a class="gallerItem" href="single-gallery.html">
                                <img src="{{ asset('frontend') }}/images/gallery/4.jpg" alt="gallery">
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <a class="gallerItem" href="single-gallery.html">
                                <img src="{{ asset('frontend') }}/images/gallery/5.jpg" alt="gallery">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End:: Gallery Section -->
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
