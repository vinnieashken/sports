
<style>

</style>

<div id="feedback-form" class="feedback-form">

    <a href="#" class="feedback-form-btn btn btn-danger btn-lg" id="OpenForm">Feedback</a>
    <div class="feedback_form_area">
        <div class="feedback_form_area_inner">
            <h4 style="font-size: 18px;" class="my-2 p-1">Kindly click the button below to give us your feedback. Thank you!</h4>
            <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLScEKE4aUSOGYNcYPoD3YzSmVDIplyA9195hoFWUFMM4yccptg/viewform?usp=sf_link"><button class="btn btn-outline-danger my-2 p-2">Feedback Form</button></a>
        </div>
    </div>
    <style>
        .feedback-form {
            position:fixed;
            top:15%;
            right:0;
            z-index:100;
            min-height:300px;
        }
        .btn-danger {
            color: #fff;
            background-color: #ee2e25 !important;
            border-color: #d51729 !important;
        }
        .feedback_form_area {
            position:relative;
            display:none;
            overflow: hidden;
            background: #f9f5f6;
        }
        .feedback_form_area_inner {
            width:300px;
            min-height:300px;
            color:#fff;
            padding:15px;
        }
        .feedback_form_area_inner h3 {
            font-size: 20px !important;
        }
        .feedback_form_area_inner a {
            margin: 5px!important;
        }
        .feedback-form-btn {
            position: absolute;
            left: -81px;
            color: #fff;
            transform: rotate(90deg);
            top: 40%;
            border-radius:0;
        }
        @media only screen and (max-width: 320px) {
            .feedback_form_area_inner {
                width:260px;
                min-height:450px;
                color:#fff;
                padding:15px;
            }
        }
        @media (max-width: 480px){
            .feedback-form-btn {
                position: absolute;
                left: -50px;
                color: #fff;
                transform: rotate(90deg);
                top: 40%;
                border-radius: 0;
                padding: 5px;
                font-size: 15px;
            }
        }
    </style>

</div>


@include('cookieConsent::index')

<section id="footer" class="footer-area pt-75">
    <hr class="my-4">
    <div class="container ">
        <div class="footer-widget  pb-120 ">
            <div class="row">
                <div class="mx-auto col-md-5 text-center ">
                    <div class="footer-logo text-left mt-40 ">
                        <h3>Get Our Newsletter</h3>
                        <p class="mt-10 mb-4">
                            Subscribe to our newsletter and stay updated on the latest developments and special offers!
                        </p>
                        <form action="{{ url('/subscribe') }}" method="post">
                            {{ csrf_field() }}
                        <input type="email" class="w-75" name="email" placeholder="Enter your email" required>

                                <button class="btn p-0" type="submit">
                                    <i class="fa fa-chevron-right newslettericon ml-2"></i>
                                </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <nav class="text-center bg-success">
            <ul class="navbar-nav justify-content-center p-3">
                <li class="nav-item from">
                    <a href="{{ url('/') }}" >
                    A product of<img data-src="{{ asset('assets/images/footerlogo.jpeg') }}"
                                       class="ml-2 w-25 lazy" alt="Standard Digital logo">
                    </a>
                </li>
            </ul>
        </nav>
        <div class=" bg-grey pl-3 w-100">
            <div class="container">
                <div class="row  bg-grey w-100 p-2">
                    <div class="mx-auto col-xs-12">
                        <ul class="nav nav-inline ">
                            <li class="nav-item">
                                <a class="nav-link active" href="http://www.btvkenya.ke/">BTV |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://www.evewoman.co.ke/">
                                    EVE WOMAN |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="http://www.spicefm.co.ke/">
                                    SPICE RADIO |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.travelog.ke/">TRAVEL |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.farmers.co.ke/">FARMERS |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.digger.co.ke/">DIGGER |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.vas.standardmedia.co.ke/">VAS |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.newsstand.standardmedia.co.ke/">EPAPER |</a>
                            </li>
                            <li class="nav-item border-0">
                                <a class="nav-link" href="https://www.standardmedia.co.ke/corporate">CORPORATE |</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="text-center bg-black">
            <ul class="navbar-nav justify-content-center p-3">
                <li class="nav-item">
                    &copy; 2020 Standard Group PLC
                </li>
            </ul>
        </nav>
    </footer>
</section>



<a href="# " class="back-to-top "><i class="lni-chevron-up "></i></a>

<div class="modal fade modals overlay align-content-center" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" {!!  \Illuminate\Support\Facades\Session::has('loginprompt') ? 'data-backdrop="static" data-keyboard="false"': '' !!}>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                @if(\Illuminate\Support\Facades\Session::get('loginprompt'))
                    <p></p>
                @else
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                </button>
                @endif
            </div>
            <div class="modal-body">
                <div class="text-center auth-logo mb-1">
                    <img class="auth-img lazy"
                         data-src="https://www.standardmedia.co.ke/assets/images/logo1.png"
                         alt="Standard Digital Logo">
                </div>
                <div class="form-title text-center">
                    <h4>Login</h4>
                    <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('loginerror') ?? \Illuminate\Support\Facades\Session::get('loginprompt')  }}</h5>
                </div>

                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="url" value="{{ URL::full() }}">
                        <div class="form-group my-2">
                            <input type="email" required class="form-control" name="email" id="email1"
                                   placeholder="Your email address..." value="{{ \Illuminate\Support\Facades\Session::get('email') }}">
                        </div>
                        <div class="form-group my-2">
                            <input type="password" required class="form-control" name="password" id="password1"
                                   placeholder="Your password...">
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="#" data-dismiss="modal" data-toggle="modal"
                                                                 data-target="#regModal" class="register text-danger">
                        Sign Up</a>.
                </div>
                <div class="signup-section"><a href="#" data-dismiss="modal" data-toggle="modal"
                                               data-target="#forgotModal" class="register text-danger"> Forgot
                        Password</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modals overlay align-content-center" id="regModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background:#fff !important">
            <div class="modal-header border-bottom-0">
                @if(\Illuminate\Support\Facades\Session::get('loginprompt'))
                    <p></p>
                @else
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                    </button>
                @endif
            </div>
            <div class="modal-body" style="z-index: 10000;">
                <div class="text-center auth-logo mb-1">
                    <img class="auth-img lazy"
                         data-src="https://www.standardmedia.co.ke/assets/images/logo1.png"
                         alt="Standard Digital Logo">
                </div>
                <div class="form-title text-center">
                    <h4>Register</h4>
                    <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('registrationerror') }}</h5>
                </div>
                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="url" value="{{ URL::full() }}">

                        <div class="form-group my-2">
                            <input  required class="form-control" name="name" id="name"
                                   placeholder="Enter your full name...">
                        </div>

                        <div class="form-group my-2">
                            <input type="email" required class="form-control" name="email" id="email"
                                   placeholder="Enter your email address..." value="{{ \Illuminate\Support\Facades\Session::get('email') }}">
                        </div>

                        <div class="form-group my-2">
                            <input  class="form-control " name="phone" id="phone"
                                   placeholder="Enter your phone number...">
                        </div>

                        <div class="form-group my-2">
                            <input type="password" required class="form-control" name="password" id="password"
                                   placeholder="Enter your password...">
                        </div>

                        <div class="form-group my-2">
                            <input type="password" required class="form-control" name="password_confirmation"
                                   id="password_confirmation" placeholder="Confirm your password...">
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Register</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">I have an account? <a
                        href="https://standardmedia.co.ke/stories/public/subscription/sign-in" data-dismiss="modal"
                        data-toggle="modal" data-target="#loginModal" class="login text-danger"> Sign In</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modals overlay align-content-center" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background:#fff !important">
            <div class="modal-header border-bottom-0">
                @if(\Illuminate\Support\Facades\Session::get('loginprompt'))
                    <p></p>
                @else
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                    </button>
                @endif
            </div>
            <div class="modal-body">
                <div class="text-center auth-logo mb-1">
                    <img class="auth-img lazy"
                         data-src="https://www.standardmedia.co.ke/assets/images/logo1.png"
                         alt="Standard Digital Logo">
                </div>
                <div class="form-title text-center">
                    <h4>Forgot Password</h4>
                    <h5 class="feedbackmsg mt-2" style=""> {{ \Illuminate\Support\Facades\Session::get('resetmsg') }}</h5>
                </div>
                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ url('/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="url" value="{{ URL::full() }}">
                        <div class="form-group my-2">
                            <input type="email" required class="form-control" name="email" id="email1"
                                   placeholder="Your email address...">
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Send Password Reset Link</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section"><a href="#" data-dismiss="modal" data-toggle="modal"
                                               data-target="#loginModal" class="register text-danger"> Log In</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal modal-white fade" id="modal_5" tabindex="-1" role="dialog"
     aria-labelledby="modal_5" aria-hidden="true">
    <div class="modal-dialog full-width-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <!--                                      <i class="fas fa-exclamation-circle fa-4x"></i>-->

                    <h4 class="heading h3 text-dark text-center heading-notify pb-5"> </br>To keep
                        reading<span class="text-danger"> The Standard</span> articles
                        create<br>
                        your free account or log in.</h4>
                </div>
                <form class="form-light " method="GET" action="{{ url('/check') }}">
                    <div class="form-group-lg mb-4">
                        <input type="email" name="email" class="form-control" id="input_email"
                               placeholder="Your email" required>
                    </div>
                    <a href="sign-up.html"> <button type="submit" class="btn btn-block btn-lg bg-danger text-white mt-4">
                            Continue
                        </button>
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

@if(\Illuminate\Support\Facades\Session::has('notifylast'))
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        header{
            z-index: 1000;
        }
        h4 {
            display: block;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bolder;
            font-size: 25px;
        }

        h1 {
            display: block;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bolder;
            font-size: 30px;
        }
        .overlayn {
            height: 0%;
            width: 100%;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            background-color: rgb(255,255,255,0.9);
            overflow-y: hidden;
            transition: 0.5s;
        }
        .font-weight-300 {
            font-weight: 300 !important;
        }
        .font-weight-600 {
            font-weight: 600 !important;
        }
        .font-weight-400 {
            font-weight: 400 !important;
        }
        .text-dark {
            color: #343a40 !important;
        }
        .text-left {
            text-align: left !important;
        }
        a.text-danger:hover, a.text-danger:focus {
            color: #cc0029 !important;
        }
        .heading {
            font-family: 'Montserrat', sans-serif;
        }
        .overlay-contentn {
            position: relative;
            top: 15%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }

        .overlayn a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .overlayn a:hover, .overlayn a:focus {
            color: #f1f1f1;
        }

        .overlayn .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
        }
        .btno:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .bg-color {
            background-color: #f03 !important;
            color: white;
        }
        .btno {
            display: inline-block;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: .0625rem solid transparent;
            padding: .75rem 1.5rem;
            font-size: .875rem;
            line-height: 1.6;
            border-radius: .375rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btno-lg, .btno-group-lg  .btno {
            padding: .5rem 7rem;
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 1.09375rem;
            line-height: 1.5;
            border-radius: .375rem;
        }
        .form-controli {
            display: initial;
            padding: 0.75rem 0.5rem;
            max-width: 375px;
            width: 75%;
            margin-top: 12px;
            font-size: .875rem;
            text-align: center;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: .0625rem solid #808386;
            border-radius: .375rem;
            box-shadow: none;
            transition: all 0.2s ease-in-out;
        }
        .overlayn a {
            padding: 8px;
            text-decoration: none;
            font-size: 20px;
            color: #0d0c0c;
            display: inline-flex;
        }
        @media screen and (max-height: 450px) {
            .overlayn {overflow-y: auto;}
            .overlayn a {font-size: 20px}
            .overlayn .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }
    </style>

    <div id="myNavEmail" class="overlayn">
        <a href="javascript:void(0)" class="closebtn" onclick="closeEmailNav()">&times;</a>
        <div class="overlay-contentn">
            <h1 class="heading h1 text-dark pt-3 pb-2 text-center font-weight-600">Stay Ahead!<br/></h1>
            <h4 class="heading h2 text-dark pt-3 pb-2 text-center font-weight-600">Access premium content only available </br>to our subscribers.</h4>

            <form class="form-light" method="GET" action="{{ url('/check') }}">
                <div class="form-group-lg mb-4">
                    <input type="email" name="email" class="form-controli" id="input_email" placeholder="Your email" required>
                </div>
                <button type="submit" class="btno btno-block btno-lg bg-color text-white">Proceed</button>
                <div class="text-center mt-4 text-dark font-weight-400">Support independent journalism </div>

            </form>
        </div>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('loginprompt'))
    <style>
        header{
            z-index: 1000;
        }
        body {
            font-family: 'Montserrat', sans-serif;
        }
        h4 {
            display: block;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bolder;
            font-size: 25px;
        }

        h1 {
            display: block;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bolder;
            font-size: 30px;
        }
        .overlayn {
            height: 0%;
            width: 100%;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            background-color: rgb(255,255,255,0.9);
            overflow-y: hidden;
            transition: 0.5s;
        }
        .font-weight-300 {
            font-weight: 300 !important;
        }
        .font-weight-600 {
            font-weight: 600 !important;
        }
        .font-weight-400 {
            font-weight: 400 !important;
        }
        .text-dark {
            color: #343a40 !important;
        }
        .text-left {
            text-align: left !important;
        }
        a.text-danger:hover, a.text-danger:focus {
            color: #cc0029 !important;
        }
        .heading {
            font-family: 'Montserrat', sans-serif;
        }
        .overlay-contentn {
            position: relative;
            top: 15%;
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }

        .overlayn a {
            padding: 8px;
            text-decoration: none;
            font-size: 36px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .overlayn a:hover, .overlayn a:focus {
            color: #f1f1f1;
        }

        .overlayn .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
        }
        .btno:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .bg-color {
            background-color: #f03 !important;
            color: white;
        }
        .btno {
            display: inline-block;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: .0625rem solid transparent;
            padding: .75rem 1.5rem;
            font-size: .875rem;
            line-height: 1.6;
            border-radius: .375rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btno-lg, .btno-group-lg  .btno {
            padding: .5rem 7rem;
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 1.09375rem;
            line-height: 1.5;
            border-radius: .375rem;
        }
        .form-controli {
            display: initial;
            padding: 0.75rem 0.5rem;
            max-width: 375px;
            width: 75%;
            margin-top: 12px;
            font-size: .875rem;
            text-align: center;
            line-height: 1.6;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: .0625rem solid #808386;
            border-radius: .375rem;
            box-shadow: none;
            transition: all 0.2s ease-in-out;
        }
        .overlayn a {
            padding: 8px;
            text-decoration: none;
            font-size: 20px;
            color: #0d0c0c;
            display: inline-flex;
        }
        @media screen and (max-height: 450px) {
            .overlayn {overflow-y: auto;}
            .overlayn a {font-size: 20px}
            .overlayn .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }
    </style>

    <div id="myNavEmail" class="overlayn">
        <a href="javascript:void(0)" class="closebtn" onclick="closeEmailNav()">&times;</a>
        <div class="overlay-contentn">
            <h1 class="heading h1 text-dark pt-3 pb-2 text-center font-weight-600">Stay Ahead!<br/></h1>
            <h4 class="heading h2 text-dark pt-3 pb-2 text-center font-weight-600">Access premium content only available </br>to our subscribers.</h4>

            <form class="form-light" method="GET" action="{{ url('/check') }}">
                <div class="form-group-lg mb-4">
                    <input type="email" name="email" class="form-controli" id="input_email" placeholder="Your email" required>
                </div>
                <button type="submit" class="btno btno-block btno-lg bg-color text-white">Proceed</button>
                <div class="text-center mt-4 text-dark font-weight-400">Support independent journalism </div>

            </form>
        </div>
    </div>

    <div id="myNavLogin" class="overlayn">
{{--        <a href="javascript:void(0)" class="closebtn" onclick="closeLoginNav()">&times;</a>--}}
        <div class="overlay-contentn">
            <h4 class="heading h2 text-dark pt-3 pb-1 text-center font-weight-600">Log in </h4>
            <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('artloginerror') ?? \Illuminate\Support\Facades\Session::get('loginprompt')  }}</h5>
            <form class="form-light" method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <input type="hidden" name="url" value="{{ URL::full() }}">
                <div class="form-group-lg mb-2">
                    <input type="email" name="email" class="form-controli" id="input_email" placeholder="Your email" value="{{ \Illuminate\Support\Facades\Session::get('email') }}" required>
                </div>
                <div class="form-group mb-2">
                    <input type="password" name="password" class="form-controli" id="input_password" placeholder="Password" required>
                </div>


                <button type="submit" class="btno btno-block btno-lg bg-color text-white">Log in</button>
                <h5 class="text-center text-dark font-weight-400">Support independent journalism </h5>
                <div class="">
                    <a href="javascript:void(0)" onclick="openRegisterNav()" class="text-danger font-weight-600">Create an account</a> &nbsp;&nbsp;&nbsp;
                    <a href="#" class="text-danger font-weight-600" href="javascript:void(0)" onclick="openResetNav()">Forgot Password</a>
                </div>

            </form>
        </div>
    </div>

    <div id="myNavRegister" class="overlayn">
        <a href="javascript:void(0)" class="closebtn" onclick="closeRegisterNav()">&times;</a>
        <div class="overlay-contentn">
            <h4 class="heading h2 text-dark pb-1 text-center font-weight-600">Create An Account </h4>
            <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('artregistrationerror')  }}</h5>
            <form class="form-light" method="post" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <input type="hidden" name="url" value="{{ URL::full() }}">
                <div class="form-group-lg mb-1">
                    <input type="text" name="name" class="form-controli" id="input_name" placeholder="Enter Your Full Name" required>
                </div>

                <div class="form-group-lg mb-1">
                    <input type="email" name="email" class="form-controli" id="input_email" placeholder=" Enter Your email"
                           value="{{ \Illuminate\Support\Facades\Session::get('email') }}"
                            required>
                </div>

                <div class="form-group-lg mb-1">
                    <input type="password" name="password" class="form-controli" id="input_phone" placeholder="Enter password" required>
                </div>

                <div class="form-group mb-2">
                    <input type="password" name="password_confirmation" class="form-controli" id="input_password" placeholder="Confirm Password" required>
                </div>


                <button type="submit" class="btno btno-block btno-lg bg-color text-white">Register</button>
                <h5 class="text-center text-dark font-weight-400">Support independent journalism </h5>
                <div class="text-center mt-1 text-dark font-weight-600">I have an account
                    <a href="javascript:void(0)" onclick="openLoginNav()" class="text-danger font-weight-600">Log in</a>
                </div>

            </form>
        </div>
    </div>

    <div id="myNavReset" class="overlayn">
        <a href="javascript:void(0)" class="closebtn" onclick="closeResetNav()">&times;</a>
        <div class="overlay-contentn">
            <h4 class="heading h2 text-dark pt-3 pb-5 text-center font-weight-600">Reset Password </h4>
            <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('artresetmsg')  }}</h5>
            <form class="form-light" method="post" action="{{ url('/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="url" value="{{ URL::full() }}">
                <div class="form-group-lg mb-4">
                    <input type="email" name="email" class="form-controli" id="input_email" placeholder="Your email" required>
                </div>


                <button type="submit" class="btno btno-block btno-lg bg-color text-white mt-4">Send Password Reset Link</button>
                <h5 class="text-center text-dark font-weight-400">Support independent journalism </h5>
                <div class=""><a href="javascript:void(0)" onclick="openLoginNav()" class="text-danger font-weight-600">Log in</a></div>

            </form>
        </div>
    </div>

{{--    <h2>Modal Example</h2>--}}
{{--    <span style="font-size:30px;cursor:pointer" onclick="openLoginNav()">&#9776; open</span>--}}

@endif

@if(\Illuminate\Support\Facades\Session::has('notifylast'))
    <style>
        .alert-dark {
            color: #fff;
            background: #545a5f linear-gradient(180deg, #6e7377, #545a5f) repeat-x;
            border-color: #545a5f;
        }
    </style>
    <div class="alert alert-dark alert-dismissible fade show bottom-0 position-sticky rounded-0 justify-content-center fixed-bottom" role="alert">
        <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
        <span class="alert-inner--text text-white "><strong>&nbsp;&nbsp; Hi!</strong>
          This is your Last free article.Kindly Login or register to access premium content only available to our subscribers. &nbsp;&nbsp;
        </span>
        <button type="button" class="btn  btn-danger" href="javascript:void(0)" onclick="openEmailNav()">
            Continue
        </button>
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">x</span>
        </button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('loginprompti'))
    <style>
        /*.overlay {*/
        /*    background-color: transparent !important;*/
        /*}*/
    </style>
@endif



