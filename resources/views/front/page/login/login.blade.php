<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+DCDbf0M4NNYztB7/BLsY4DSgiJdnYgmVOJPOt" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('frontend/login-css.css') }}" />
    <!-- <link rel="stylesheet" href="assets/self.css" /> -->
    <title>Cosmonesa | Login/Register Page</title>
</head>

<body>
    <section class="login-section">
        <div class="wrapper">
            <div class="slider-wrapper">
                <div class="slider">
                    <img id="slider-1"
                        src="https://images.unsplash.com/photo-1515377905703-c4788e51af15?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" />
                    <img id="slider-2"
                        src="https://plus.unsplash.com/premium_photo-1683134297492-cce5fc6dae31?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" />
                    <img id="slider-3"
                        src="https://images.unsplash.com/photo-1583417267826-aebc4d1542e1?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" />
                    <img id="slider-4"
                        src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" />
                    <img id="slider-5"
                        src="https://images.unsplash.com/photo-1532926381893-7542290edf1d?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" />
                    <div class="slider-nav">
                        <a href="#slider-1"></a>
                        <a href="#slider-2"></a>
                        <a href="#slider-3"></a>
                        <a href="#slider-4"></a>
                        <a href="#slider-5"></a>
                    </div>
                </div>
            </div>
            <div class="login-form" id="login-form">
                <h1>Welcome to Cosmonesa</h1>
                <p>please login with your member account</p>

                <!-- <form id="login"> -->
                <div class="input-group">
                    <!-- <label for="username">Username</label> -->
                    <i class="fas fa-user"></i>
                    <input type="text" id="username" name="username" placeholder="Username" />
                </div>
                <div class="input-group">
                    <!-- <label for="password">Password</label> -->
                    <i class="fas fa-key"></i>
                    <input type="password" id="password" name="password" placeholder="Password" />
                </div>
                <div class="forget-pwd">
                    <a href="#">Lupa password?</a>
                </div>
                <button type="submit">Login <i class="fas fa-sign-in"></i></button>
                <!-- </form> -->
                <p>
                    Don't have an account?
                    <a class="reg" onclick="showRegister()">Register here</a>
                </p>

                <p style="margin: 10px">or</p>

                <div class="social-login">
                    {{-- <a href="{{ route('oauth.google') }}">
                        <div class="fb">
                            <i class="fab fa-facebook-f"></i>
                            <p>Login with Facebook</p>
                        </div>
                    </a> --}}
                    <a href="{{ route('oauth.google') }}">
                        <div class="gg">
                            <i class="fab fa-google"></i>
                            <p>Login with Google</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="login-form" id="register-form" style="display: none">
                <h1>Welcome to Cosmonesa</h1>
                <p>please Register here</p>

                <!-- <form id="login"> -->
                <div class="input-group">
                    <!-- <label for="username">Username</label> -->

                    <input type="text" id="fullname" name="fullname" placeholder="fullname" />
                </div>
                <div class="input-group">
                    <!-- <label for="username">Username</label> -->

                    <input type="text" id="email" name="email" placeholder="email" />
                </div>
                <div class="input-group">
                    <!-- <label for="password">Password</label> -->

                    <input type="password" id="password" name="password" placeholder="Password" />
                </div>

                <button type="submit">Register <i class="fas fa-sign-in"></i></button>
                <!-- </form> -->
                <p>
                    Do you have an account?
                    <a class="reg" onclick="showLogin()">Login here</a>
                </p>

                <p style="margin: 10px">or</p>

                <div class="social-login">
                    <a href="{{ route('oauth.google') }}">
                        <div class="fb">
                            <i class="fab fa-facebook-f"></i>
                            <p>Register with Facebook</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="gg">
                            <i class="fab fa-google"></i>
                            <p>Register with Google</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"
    integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showRegister() {
        document.getElementById("login-form").style.display = "none";
        document.getElementById("register-form").style.display = "";
    }

    function showLogin() {
        document.getElementById("register-form").style.display = "none";
        document.getElementById("login-form").style.display = "";
    }

    const slider = document.querySelector(".slider");
    let index = 0;

    function epicSlide() {
        const sliderItems = slider.children;
        index = (index + 1) % sliderItems.length; // Loop images

        // Reset styles for all slider items
        Array.from(sliderItems).forEach((item) => {
            item.style.transform = "scale(1)";
            item.style.opacity = "1";
            item.style.transition =
                "transform 1s ease-in-out, opacity 1s ease-in-out"; // Smooth transitions
        });

        // Apply zoom and opacity effect to the active item
        sliderItems[index].style.transform = "scale(1.2)"; // Zoom effect
        sliderItems[index].style.opacity = "0.9"; // Slight fade for depth effect

        slider.scrollTo({
            left: sliderItems[index].offsetLeft,
            behavior: "smooth",
        });
    }

    setInterval(epicSlide, 3000); // Slides every 3 seconds// Slides every 3 seconds // Slides every 3 seconds
</script>
