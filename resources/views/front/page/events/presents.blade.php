@extends('front.layouts.main')
@section('title', 'Workshop Presents')

@section('body')
    <!-- Begin:: Appointment Section -->
    <section class="commonSection apointmentSection2 as3">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-5">
                    <div class="cta">
                        <div class="cta_center">
                            <p>Jadilah</p>
                            <p><span>Yang Pertama</span></p>
                            <p>Hadir</p>
                            <p>Disini</p>
                            <a href="booking.html" class="mo_btn"><i class="icofont-cart-alt"></i>Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="appointment_form">
                        <h3>Workshop Presents</h3>
                        <p>Mohon isi dengan benar dan sesuai</p>
                        <form action="#" method="post" class="row">
                            <div class="input-field col-lg-6">
                                <input type="text" name="name" placeholder="Name" />
                            </div>
                            <div class="input-field col-lg-6">
                                <input type="email" name="email" placeholder="E-mail" />
                            </div>
                            <div class="input-field col-lg-6">
                                <input type="number" name="phone" placeholder="Phone Number" />
                            </div>
                            <div class="input-field col-lg-6">
                                <select name="select_subject">
                                    <option selected="selected">Pilih Workshop</option>
                                    <option>Judul Workshop 1</option>
                                    <option>Judul Workshop 2</option>
                                    <option>Judul Workshop 3</option>
                                    {{-- <option>Stone Massage</option>
                                <option>Body Massage</option>
                                <option>Head Massage</option>
                                <option>Facial & Massage</option> --}}
                                </select>
                            </div>
                            <div class="input-field col-lg-12">
                                <input type="text" name="date_time" class="datetime-picker"
                                    placeholder="Select Date & Time" />
                                <i class="icofont-ui-calendar"></i>
                            </div>
                            <div class="input-field col-lg-12">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="input-field col-lg-12">
                                <button type="submit" class="mo_btn"><i class="icofont-calendar"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Appointment Section -->
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
