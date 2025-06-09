@extends('front.layouts.main')
@section('title', 'Workshop Presents')

@section('body')


<section class="page_banner">
        {{-- <div class="layer_img move_anim animated">
            <img src="{{ asset('frontend') }}/images/bg/page_layer.png" alt="" />
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Events</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>Events</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <form id="test" method="post" action="/join_event">
                        @csrf
                        <input name="event_id" type="text">
                        <button type="submit">save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


