


{{--<script src="https://standardmedia.co.ke/stories/public/assets/js/vendor/modernizr-3.6.0.min.js "></script>--}}

{{--<script async src="https://cse.google.com/cse.js?cx=011965659370381653902:7awkdkhs2_y"></script>--}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous" ></script>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" defer></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous" defer></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}" async></script>
<script src="{{ asset('assets/js/lazy.js')}}" defer></script>


<script>
    $(document).ready(function(){
        $("#OpenForm").click(function(){
            $(".feedback_form_area").animate({
                width: "toggle"
            });
        });
    });
</script>

</body>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    };

    function openNavMob() {
        document.getElementById("mySidenavMob").style.width = "250px";
    }

    function closeNavMob() {
        document.getElementById("mySidenavMob").style.width = "0";
    }

    $(document).ready(function () {
        $("#myImagese").show();
    });

    $(document).scroll(function () {
        var y = $(document).scrollTop(),
            image = $("#myImagese"),
            header = $("#menu");


        if (y >= 100) {
            header.removeClass('fixed');
            image.hide();
        } else {
            header.addClass('fixed');
            image.show();
        }
    });
    $(document).ready(function () {

        $("#myImage").hide();
    });

    $(document).scroll(function () {
        var y = $(document).scrollTop(),
            image = $("#myImage"),
            header = $("#menu");


        if (y >= 100) {

            header.addClass('fixed');
            image.show();
        } else {
            header.removeClass('fixed');
            image.hide();
        }
    });
    $(function () {

        var hub = $('header');

        $(window).scroll(function () {

            var current = $(this).scrollTop();

            if (!current) hub.removeClass('small');
            else if (!hub.hasClass('small')) {
                hub.addClass('small inhibit');
                setTimeout(function () {
                    hub.removeClass('inhibit');
                }, 2000);
            }
        });
    });
    jQuery(function ($) {
        if ($(window).width > 700) {


            $('.navbar .dropdown').hover(function () {

                $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

            }, function () {
                $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

            });

            $('.navbar .dropdown > a').click(function () {
                location.href = this.href;
            });
        }
    });

    window.NREUM || (NREUM = {});
    NREUM.info = {
        "beacon": "bam.nr-data.net",
        "licenseKey": "32869a221e",
        "applicationID": "240832579",
        "transactionName": "bgcBbRRRVkNWVUxfV1dNIloSWVdeGHdIRmRxFhdJOnNXXkNEV1pUXBAQZS5fVVV0WVZCSlYOD1wUcFFeU1NA",
        "queueTime": 0,
        "applicationTime": 180,
        "atts": "QkACG1xLRU0=",
        "errorBeacon": "bam.nr-data.net",
        "agent": ""
    }
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }
    $(function () {

        var hub = $('header');

        $(window).scroll(function () {

            var current = $(this).scrollTop();

            if (!current) hub.removeClass('small');
            else if (!hub.hasClass('small')) {
                hub.addClass('small inhibit');
                setTimeout(function () {
                    hub.removeClass('inhibit');
                }, 2000);
            }
        });
    });

    $('.modal').on('hidden.bs.modal', function () {

        $('.feedbackmsg').text('');
    });



</script>



    @if(\Illuminate\Support\Facades\Session::has('loginerror'))
        <script>
            $(document).ready(function () {
                //alert('Hello');

                $("#loginModal").modal('show');
            });

        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('registrationerror'))
        <script>
            $(document).ready(function () {
                //alert('Hello');

                $("#regModal").modal('show');
            });

        </script>
    @endif

    @if(\Illuminate\Support\Facades\Session::has('resetmsg'))
    <script>
        $(document).ready(function () {
            //alert('Hello');

            $("#forgotModal").modal('show');
        });

    </script>
@endif

