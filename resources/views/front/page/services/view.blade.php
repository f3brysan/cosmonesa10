@extends('front.layouts.main')
@section('title', $service->name)

@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">{{ $service->name }}</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>{{ $service->name }}</p>
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
                            <h3>{{ $service->name }}</h3>
                            <p>Rp {{ number_format($service->price, 0, '.', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="spa_content">
                        {!! $service->description !!}
                        <div class="booked-appt-list shown">
                            <h5><span>Available Appointments</span></h5>
                            <div class="accordion mkAccordion" id="mkAccordion01">
                                @foreach ($slotDays as $slotday)
                                    <div class="card">
                                        <div class="card-header" id="ma_ac_day_{{ $slotday['date'] }}">
                                            <h2 class="mb-0">
                                                <button type="button" class="collapsed" data-toggle="collapse"
                                                    data-aria-expanded="false"
                                                    data-target="#ma_collapes_day_{{ $slotday['date'] }}"
                                                    data-aria-controls="ma_collapes_01">
                                                    {{ Carbon\Carbon::parse($slotday['date'])->translatedFormat('l, d F Y') }}
                                                    <span></span>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="ma_collapes_day_{{ $slotday['date'] }}" class="collapse"
                                            aria-labelledby="ma_ac_day_{{ $slotday['date'] }}"
                                            data-parent="#mkAccordion01">
                                            <div class="card-body">
                                                <table style="border: 0; padding: 0; width: 100%;">
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Book Now</th>
                                                    </tr>
                                                    @foreach ($slots as $slot)
                                                        <tr>
                                                            <td>{{ Carbon\Carbon::parse($slot->start_at)->translatedFormat('H:i') }}
                                                                -
                                                                {{ Carbon\Carbon::parse($slot->end_at)->translatedFormat('H:i') }}
                                                            </td>
                                                            <td>
                                                                @if (!empty($bookings))
                                                                    @foreach ($bookings as $booking)
                                                                        @if ($booking->slot_id == $slot->id and $booking->date == $slotday['date'])
                                                                            <a href="javascript:void(0)"
                                                                                class="btn btn-sm btn-outline-danger disabled">
                                                                                Booked</a>                                                                        
                                                                        @endif
                                                                    @endforeach
                                                                    </a>
                                                                    <a href="{{ URL::to('service-booking/' . $service->id . '/' . $slotday['date'] . '/' . $slot->id) }}"
                                                                        class="btn btn-sm btn-outline-primary"> Make
                                                                        Appointment
                                                                    @else
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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

    {{-- <!-- Begin:: Video Section -->
    <div class="video_banner videoWrap">
        <img src="{{ asset('frontend') }}/images/single_service/3.jpg" alt="">
        <a href="https://player.vimeo.com/video/23534361" class="popup_video"><i class="icofont-play"></i></a>
    </div>
    <!-- End:: Video Section --> --}}

    <!-- Begin:: Gallery Section -->
    {{-- <div class="my_gallery">
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
    </div> --}}
    <!-- End:: Gallery Section -->


    <!-- Modal -->
    <div class="modal fade" id="modalBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        function bookNow(id) {
            $('#modalBook').modal('show');
        }
    </script>
@endpush
