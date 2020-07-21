
<style>
    .alert-dark {
        color: #fff;
        background: #545a5f linear-gradient(180deg, #6e7377, #545a5f) repeat-x;
        border-color: #545a5f;
    }

    .btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active, .show > .btn-danger.dropdown-toggle {
        color: #fff;
        background-color: #cc0029;
        background-image: none;
        border-color: #bf0026;
    }

    .btn-danger:hover {
        color: #fff;
        background: #d9002b linear-gradient(180deg, #df264b, #d9002b) repeat-x;
        border-color: #cc0029;
    }

    i, span {
        display: inline-block;
        font-family: Solido;
        color: white;
    }
    .heading-notify{
        margin-bottom: .5rem;
        font-family: inherit;
        font-weight: 600;
        line-height: 1.5;
        color: #343a40 !important;
    }
    @media (min-width: 576px) {
        .full-width-dialog{
            max-width: 100% !important;
            margin: 0;
        }

    }

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
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                </button>
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
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background:#fff !important">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                </button>
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
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background:#fff !important">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close text-dark"></i></span>
                </button>
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
    <div class="alert alert-dark alert-dismissible fade show bottom-0 position-sticky rounded-0 justify-content-center fixed-bottom" role="alert">
        <span class="alert-inner--icon"><i class="fa fa-check"></i></span>
        <span class="alert-inner--text text-white "><strong>&nbsp;&nbsp; Hi!</strong>
          This is your Last free article.Kindly Login or register to continue reading more free articles &nbsp;&nbsp;
        </span>
        <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#modal_5">
            Continue
        </button>
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">x</span>
        </button>
    </div>
@endif


