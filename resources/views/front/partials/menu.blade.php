<nav class="mainMenu">
    <ul>
        <li><a href="{{ '/' }}">Home</a></li>
        <li><a href="{{ '/shop' }}">Product</a></li>
        <li><a href="{{ '/service-cat' }}">Services</a></li>
        <li><a href="{{ '/events' }}">Events & Workshop</a></li>
        <li><a href="contact.html">Contact</a></li>
        @if (Auth::check())
        <li class="menu-item-has-children">
            <a href="javascript:void(0);">{{ Auth::user()->name }}</a>
            <ul class="sub-menu">
                <li><a href="/account">My Account</a></li>
                <li><a href="{{ '/tenant-register' }}">Register Tenant</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            </ul>
        </li>
        @else
            <li><a href="/login">Login</a></li>
        @endif
    </ul>
</nav>
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
