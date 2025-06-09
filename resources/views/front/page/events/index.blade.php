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
    <section class="cartPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="woocommerce">
                        <table id="participationTable" class="shop_table">
                            <thead>
                                <tr>
                                    <th class="product-name">No</th>
                                    <th class="product-price">Event/Workshop Title</th>
                                    <th class="product-quantity">Event's Date</th>
                                    <th class="product-subtotal">Status</th>
                                    <th class="product-remove">Cert Print</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">
                                <tr class="cart_item">
                                    <td class="product-name" data-title="Product">
                                        <a class="p-img" href="single-product.html"><img src="images/product/2.jpg"
                                                alt=""></a>
                                        <a href="single-product.html">Cream & Brush</a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>87.00</bdi></span>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity quantityd clearfix">
                                            <button type="button" class="minus qtyBtn btnMinus">-</button>
                                            <input type="number" class="carqty input-text qty text" name="quantity"
                                                value="2">
                                            <button type="button" class="plus qtyBtn btnPlus">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>174.00</bdi></span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="javascript:void(0);" class="remove">×</a>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name" data-title="Product">
                                        <a class="p-img" href="single-product.html"><img src="images/product/4.jpg"
                                                alt=""></a>
                                        <a href="single-product.html">Beauty Harbal Soap</a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99.99</bdi></span>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity quantityd clearfix">
                                            <button type="button" class="minus qtyBtn btnMinus">-</button>
                                            <input type="number" class="carqty input-text qty text" name="quantity"
                                                value="1">
                                            <button type="button" class="plus qtyBtn btnPlus">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">$</span>99.99</bdi></span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="javascript:void(0);" class="remove">×</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Begin:: Blog Section -->
    <section class="blogPage">
        <div class="container">
            <div class="sectionTitle text-center">
                <img src="http://127.0.0.1:8000/frontend/images/icons/2.png" alt="">
                <h5 class="primaryFont">Let's Join</h5>
                <h2>Upcoming <span class="colorPrimary fontWeight400">Next Events</span></h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                    facilisis.
                </p>
            </div>
            <div class="row">

                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_item_01">
                            <img src="{{ 'https://picsum.photos/1280/780/?blur' }}" alt="" />
                            <div class="bp_content">
                                <span>
                                    @php
                                        $date = Carbon\Carbon::parse($event->event_date);
                                        echo $date->translatedFormat('l, d F Y');
                                    @endphp
                                </span>
                                <h3><a href="{{ URL::to('detail-event/' . $event->slug) }}">{{ $event->title }}</a></h3>
                                <a class="lr_more" href="{{ URL::to('detail-event/' . $event->slug) }}">
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
                @endforeach
                @foreach ($lastEvents as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_item_01">
                            <img src="{{ 'https://picsum.photos/1280/780/?blur' }}" alt="" />
                            <div class="bp_content">
                                <span class="badge bg-danger">Closed</span>
                                <span>
                                    @php
                                        $date = Carbon\Carbon::parse($event->event_date);
                                        echo $date->translatedFormat('l, d F Y');
                                    @endphp
                                </span>
                                <h3><a href="{{ URL::to('detail-event/' . $event->slug) }}">{{ $event->title }}</a></h3>
                                <a class="lr_more" href="{{ URL::to('detail-event/' . $event->slug) }}">
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
                @endforeach
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
@push('js')
    <script>
        $(document).ready(function() {
            $.ajax({
    type: "get",
    url: "{{ URL::to('/participations') }}",
    dataType: "json",
    success: function (response) {
        console.log(response); // Debugging purpose

        let tableBody = $("#participationTable tbody"); // Select the table body
        tableBody.empty(); // Clear previous entries

        if (response.data.length > 0) {
            $.each(response.data, function (index, participation) {
                // Format start and end date into Indonesian format
                let eventDate = new Date(participation.event_date).toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });



                // Combine formatted dates


                // Create row dynamically
                let row = `
                    <tr class="cart_item">
                        <td class="product-name">${index + 1}</td>
                        <td class="product-price">${participation.title}</td>
                        <td class="product-quantity">${eventDate}</td>
                        <td class="product-subtotal">${"complete"? "complete": "Pending"}</td>
                        <td class="product-remove">
                            ${"complete" ? `<a href="/cert/${participation.event_id}" class="btn btn-primary">Print</a>` : `<span class="text-muted">N/A</span>`}
                        </td>
                    </tr>
                `;
                tableBody.append(row); // Append row to table
            });
        } else {
            tableBody.append(`<tr><td colspan="5" class="text-center">No participation records found.</td></tr>`);
        }
    },
    error: function () {
        $("#participationTable tbody").append(`<tr><td colspan="5" class="text-center">Failed to load data.</td></tr>`);
    }
});
        });
    </script>
@endpush
