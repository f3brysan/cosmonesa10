@extends('front.layouts.main')
@section('title', 'Appointment')

@section('body')
    <!-- popup sidebar widget -->
    <section class="popup_sidebar_sec">
        <div class="popup_sidebar_overlay"></div>
        <div class="widget_area">
            <a href="javascript:void(0);" class="widget_closer"><i class="icofont-close-line"></i></a>
            <div class="center_align">
                <div class="about_widget_area">
                    <div class="wd_logo">
                        <a href="index.html"><img src="{{ asset('frontend/images/logo.png') }}" alt="makeover" /></a>
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
            <img src="{{ asset('frontend/images/bg/page_layer.png') }}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="banner-title">Appointment</h2>
                    <p class="breadcrumbs"><a href="index.html">Home</a><span>/</span>appointment</p>
                </div>
                <div class="col-lg-6 animated pnl">
                    <div class="page_layer">
                        <img src="{{ asset('frontend/images/bg/banner_layer.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->
    <!-- Begin:: Appointment Section -->
    <section class="commonSection apointmentSection2 as3">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-5">
                    <div class="cta">
                        <div class="cta_center">
                            <p>Come</p>
                            <p><span>Experience</span></p>
                            <p>The Real</p>
                            <p>Delight</p>
                            <a href="booking.html" class="mo_btn"><i class="icofont-cart-alt"></i>Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="appointment_form">
                        <h3>Make Appointment</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
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
                                    <option selected="selected">Select Subject</option>
                                    <option>Sports Massage</option>
                                    <option>Stone Massage</option>
                                    <option>Body Massage</option>
                                    <option>Head Massage</option>
                                    <option>Facial & Massage</option>
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
                                <button type="submit" class="mo_btn"><i class="icofont-calendar"></i>Make An
                                    Appointment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Appointment Section -->
    <!-- Begin:: datebook Section -->
    <section class="commonSection bookingSections">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="booked-calendar-shortcode-wrap">
                        <div class="booked-calendar-wrap large">
                            <table class="booked-calendar">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <a href="#" data-goto="2021-06-01" class="page-left">
                                                <i class="booked-icon booked-icon-arrow-left"></i>
                                            </a>
                                            <span class="monthName">
                                                July 2021
                                                <a href="#" class="backToMonth" data-goto="2021-06-01">Back to
                                                    June</a>
                                            </span>
                                            <a href="#" class="page-right">
                                                <i class="booked-icon booked-icon-arrow-right"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr class="days">
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                        <th>Sun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="week">
                                        <td class="prev-month prev-date">
                                            <span class="date"><span class="number" style="">31</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">1</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">2</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">3</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">4</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">5</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">6</span></span>
                                        </td>
                                    </tr>
                                    <tr class="week">
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">7</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">8</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">9</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">10</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">11</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">12</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">13</span></span>
                                        </td>
                                    </tr>
                                    <tr class="week">
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">14</span></span>
                                        </td>
                                        <td class="today">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">15</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">16</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">17</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">18</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">19</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">20</span></span>
                                        </td>
                                    </tr>
                                    <tr class="entryBlock">
                                        <td colspan="7">
                                            <div class="booked-appt-list shown">
                                                <h2><span>Available Appointments on </span><strong>June 17,
                                                        2021</strong><span></span></h2>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;9:00 am – 10:00 am
                                                        </span>
                                                        <span class="spots-available">0 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button disabled data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Unavailable</span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;10:30 am – 11:30 am
                                                        </span>
                                                        <span class="spots-available">0 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button disabled data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Unavailable</span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;12:00 am – 1:00 pm
                                                        </span>
                                                        <span class="spots-available">1 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Book Appointment</span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;1:30 pm – 2:30 pm
                                                        </span>
                                                        <span class="spots-available">1 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Book Appointment</span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;3:00 pm – 4:00 pm
                                                        </span>
                                                        <span class="spots-available">1 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Book Appointment</span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="timeslot bookedClearFix has-title ">
                                                    <span class="timeslot-time">
                                                        <span class="timeslot-title">Slot Title</span>
                                                        <span class="timeslot-range">
                                                            <i class="booked-icon booked-icon-clock"></i>
                                                            &nbsp;&nbsp;4:30 pm – 5:30 pm
                                                        </span>
                                                        <span class="spots-available">1 space available</span>
                                                    </span>
                                                    <span class="timeslot-people">
                                                        <button data-calendar-id="0" data-title="Slot"
                                                            data-timeslot="0900-0905" data-date="2021-06-17"
                                                            class="new-appt button">
                                                            <span class="button-text">Book Appointment</span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="week">
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">21</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">22</span></span>
                                        </td>
                                        <td class=""><span class="date tooltipster tooltipstered"><span
                                                    class="number" style="">23</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">24</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">25</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">26</span></span>
                                        </td>
                                        <td class="prev-date">
                                            <span class="date"><span class="number" style="">27</span></span>
                                        </td>
                                    </tr>
                                    <tr class="week">
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">28</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">29</span></span>
                                        </td>
                                        <td class="">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">30</span></span>
                                        </td>
                                        <td class="next-month">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">1</span></span>
                                        </td>
                                        <td class="next-month">
                                            <span class="date tooltipster tooltipstered"><span class="number"
                                                    style="">2</span></span>
                                        </td>
                                        <td class="next-month prev-date">
                                            <span class="date"><span class="number" style="">3</span></span>
                                        </td>
                                        <td class="next-month prev-date">
                                            <span class="date"><span class="number" style="">4</span></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: datebook Section -->
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
