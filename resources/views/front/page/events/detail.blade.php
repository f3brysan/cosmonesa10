@extends('front.layouts.main')
@section('title', 'Workshop Presents')

@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Event Detail</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Event Detail</p>
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

    <!-- Begin:: Single Blog Section -->
    <section class="singleBlog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="postThumb">
                        <img src="{{ asset('storage/' . $event->picture) ?? 'https://picsum.photos/1280/780/?blur' }}"
                            alt="banner-image" />
                    </div>
                    <div class="sic_details clearfix">
                        @php
                            $date = Carbon\Carbon::parse($event->event_date);
                        @endphp
                        <span class="bpdate">{{ $date->translatedFormat('l, d F Y') }}</span>
                        <h3>{{ $event->title }}</h3>
                        <button class="mo_btn" onclick="greet(this)" data-id="{{ $event->id }}">Join</button>
                        {{-- <button onclick="greet(this)" data-username="Mike">Click me</button> --}}
                        <div class="sic_the_content clearfix">
                            {{-- Description --}}
                            {!! $event->description !!}
                            {{-- Description --}}
                            <div class="commentForm">
                                <form>
                                    @php
                                        $status = true;

                                        $status = $event->event_date <= Carbon\Carbon::now() ? false : $status;

                                        if ($status == true) {
                                            $status = $event->quota < 1 ? false : true;
                                        }

                                        if ($status == true) {
                                            $status = $event->end_date <= Carbon\Carbon::now() ? false : true;
                                        }
                                    @endphp
                                    @if ($status == true)
                                        <div class="col-md-12">
                                            <a href="{{ '/join' }}" class="mo_btn" type="submit"><i
                                                    class="icofont-long-arrow-right"></i>Join
                                                Now</a>
                                        </div>
                                    @endif
                                </form>

                            </div>
                        </div>
                        <div class="spMeta clearfix">
                            <div class="row">
                                <div class="col-offset-6 col-md-6">
                                    <div class="socialShare">
                                        <a target="_blank" href="https://www.facebook.com/"><i
                                                class="icofont-facebook"></i></a>
                                        <a target="_blank" href="https://twitter.com/"><i class="icofont-twitter"></i></a>
                                        <a target="_blank" href="https://bebo.com/"><i class="icofont-bebo"></i></a>
                                        <a target="_blank" href="https://dribbble.com/"><i class="icofont-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment_area">
                    </div>
                    <div class="relatedPostArea">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <aside class="widget">
                            <h3 class="widget_title">Related Events</h3>
                            @foreach ($relatedEvents as $rEvent)
                                <div class="pp_post_item">
                                    <img src="{{ asset('storage/' . $rEvent->picture) ?? 'https://picsum.photos/1280/780/?blur' }}"
                                        alt="" />
                                    <h5><a
                                            href="{{ URL::to('detail-event/' . $rEvent->slug . '/') }}">{{ Str::limit($rEvent->title, 30, '...') }}</a>
                                    </h5>
                                    <span>{{ Carbon\Carbon::parse($rEvent->event_date)->translatedFormat('l, d F Y') }}</span>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Single Blog Section -->
@endsection

@push('js')
    <script>
        function greet(button) {
            let id = button.getAttribute("data-id");
            // alert("Hello, " + id + "!");
            $.ajax({
                type: "POST",
                url: "/join_event",
                data: {

                    "event_id": id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: "Berhsil!",
                            text: response.message,
                            icon: "success"
                        });
                    } else if (response.status === false) {
                        Swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error"
                        });

                    } else if (response.status === 409) {
                        Swal.fire({
                            title: "Warning!",
                            text: response.message,
                            icon: "warning"
                        });

                    }
                }
            });
        }
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
    </script>
@endpush
