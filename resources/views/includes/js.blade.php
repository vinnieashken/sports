


<script src="https://standardmedia.co.ke/stories/public/assets/js/vendor/modernizr-3.6.0.min.js "></script>

{{--<script async src="https://cse.google.com/cse.js?cx=011965659370381653902:7awkdkhs2_y"></script>--}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/lazy.js')}}"></script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    };

    <!--added mobile sidenav-->
    function openNavMob() {
        document.getElementById("mySidenavMob").style.width = "250px";
    }

    function closeNavMob() {
        document.getElementById("mySidenavMob").style.width = "0";
    }

    <!--added mobile sidenav-->
</script>
<script>
    $(document).ready(function () {
        //hides them logo when the page loads
        $("#myImagese").show();
    });

    $(document).scroll(function () {
        var y = $(document).scrollTop(),
            image = $("#myImagese"),
            header = $("#menu");


        if (y >= 100) {
            //show the image and make the header fixed
            header.removeClass('fixed');
            image.hide();
        } else {
            //put the header in original position and hide image
            header.addClass('fixed');
            image.show();
        }
    });
    $(document).ready(function () {
        //hides them logo when the page loads
        $("#myImage").hide();
    });

    $(document).scroll(function () {
        var y = $(document).scrollTop(),
            image = $("#myImage"),
            header = $("#menu");


        if (y >= 100) {
            //show the image and make the header fixed
            header.addClass('fixed');
            image.show();
        } else {
            //put the header in original position and hide image
            header.removeClass('fixed');
            image.hide();
        }
    });
</script>
<script>
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
</script>
<script>
    $(document).ready(function () {
        $("#loadMore").on('click', function (e) {
            e.preventDefault();
            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var rowperpage = 7;
            row = row + rowperpage;

            if (row <= allcount) {
                $('#row').val(row);
                var id = $('#id').val();
                console.log(id);
                $.ajax({
                    url: 'https://standardmedia.co.ke/stories/public/category-load-more',
                    type: 'post',
                    data: {
                        row: row,
                        id: id
                    },
                    success: function (response) {
                        $(".post:last").after(response).show().fadeIn("slow");
                    }

                });
            }
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
</script>
<script>


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

    // var sc = $(".secondnav").position().top;
    //
    // $(window).scroll(function () {
    //     var height = $(window).scrollTop();
    //     if (height >= sc) {
    //         $(".secondnav").addClass("fixed-top");
    //     } else {
    //         $(".secondnav").removeClass("fixed-top");
    //     }
    // });

</script>
<script type="text/javascript">window.NREUM || (NREUM = {});
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
    }</script>

<script>
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }
</script>
</body>

<script>
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
        // do something…
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

