
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
                        <input type="text" class="w-75" name="email" placeholder="Enter your email">

                                <button class="btn btn-light subscribe-btn" type="submit">
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
                    GameYetu from <img src="{{ asset('assets/images/logo.png') }}"
                                       class="ml-2 w-25">
                </li>
            </ul>
        </nav>
        <div class=" bg-grey pl-3 w-100">
            <div class="container">
                <div class="row  bg-grey w-100">
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

<div class="modal fade modals overlay" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <img src="{{ url('/assets/images/logo.png') }}" alt="Standard Digital Logo">
                </div>
                <div class="form-title text-center">
                    <h4>Login</h4>
                    <h5 class="feedbackmsg mt-2" style="color: red"> {{ \Illuminate\Support\Facades\Session::get('loginerror') }}</h5>
                </div>

                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="url" value="{{ URL::full() }}">
                        <div class="form-group my-2">
                            <input type="email" required class="form-control" name="email" id="email1"
                                   placeholder="Your email address...">
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
                                                                 data-target="#regModal" class="register text-info">
                        Sign Up</a>.
                </div>
                <div class="signup-section"><a href="#" data-dismiss="modal" data-toggle="modal"
                                               data-target="#forgotModal" class="register text-info"> Forgot
                        Password</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modals overlay" id="regModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <img src="{{ url('/assets/images/logo.png') }}" alt="Standard Digital Logo">
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
                            <input type="text" required class="form-control custom-input" name="name" id="name"
                                   placeholder="Enter your full name...">
                        </div>

                        <div class="form-group my-2">
                            <input type="email" required class="form-control" name="email" id="email"
                                   placeholder="Enter your email address...">
                        </div>

                        <div class="form-group my-2">
                            <input type="text" class="form-control custom-input" name="phone" id="phone"
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
                        data-toggle="modal" data-target="#loginModal" class="login text-info"> Sign In</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modals overlay" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <img src="{{ url('/assets/images/logo.png') }}" alt="Standard Digital Logo">
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
                                               data-target="#loginModal" class="register text-info"> Log In</a>.
                </div>
            </div>
        </div>
    </div>
</div>

