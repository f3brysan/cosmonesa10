@extends('front.layouts.main')
@section('title', "Service's Categories")
@section('body')
    <!-- Begin:: Banner Section -->
    <section class="page_banner">
        <div class="layer_img move_anim animated">
            <img src="images/bg/page_layer.png" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Service's Categories</h2>
                    <p class="breadcrumbs"><a href="/">Home</a><span>/</span>Service Categories</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="images/bg/banner_layer.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->
    <div class="commonSection servicePage">
        <div class="container">
            <div id="content" class="row">

                    <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="167.000000pt"
                                height="147.000000pt" viewBox="0 0 167.000000 147.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525"
                                    stroke="none">
                                    <path d="M1257 2920 c-50 -9 -109 -25 -130 -35 -20 -11 -95 -25 -165 -31 -523
                                                   -45 -900 -630 -953 -1477 -43 -680 253 -1056 996 -1266 720 -204 1195 -98
                                                   1691 377 805 772 854 1763 105 2149 -412 213 -1153 349 -1544 283z" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class=""></i></div>
                            <i class=""></i>
                        </div>
                        <h3><a href=""></a></h3>
                        {{-- <p>
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                        </p> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- <div class="bg_icon"><i class="mkov-stone"></i></div>
    <div class="bg_icon"><i class="mkov-candle"></i></div>
    <div class="bg_icon"><i class="mkov-morter"></i></div>
    <div class="bg_icon"><i class="mkov-bottle"></i></div>
    <div class="bg_icon"><i class="mkov-spa-drop"></i></div>
    <div class="bg_icon"><i class="mkov-massage-oil"></i></div>
    <div class="bg_icon"><i class="mkov-span-steam"></i></div>
    <div class="bg_icon"><i class="mkov-steam"></i></div> --}}

@endsection
@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "{{ URL::to('/get-service-cat') }}",
            datatype: "json",
            success: function(response) { // Change 'data' to 'response'
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

                    serviceHtml += `
                <div class="col-lg-3 col-md-6">
                    <div class="serviceItem_01 text-center">
                        <div class="ib_box">
                            <svg width="167.000000pt" height="147.000000pt" viewBox="0 0 167.000000 147.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,147.000000) scale(0.050000,-0.050000)" fill="#252525" stroke="none">
                                    <path d="${randomPath}" />
                                </g>
                            </svg>
                            <div class="bg_icon"><i class="${randomIcon}"></i></div>
                            <i class="${randomIcon}"></i>
                        </div>
                        <h3><a href="{{ URL::to('/services') }}/${service.slug}">${service.name}</a></h3>
                        {{-- <p>ini aku bingung mu diisi apa, soalnya ServiceCategories::all() cuman nglempar name  </p>--}}
                    </div>
                </div>
            `;
                });

                $('#content').html(serviceHtml);
            }

        });
    </script>
@endpush
