


{{--<script src="https://standardmedia.co.ke/stories/public/assets/js/vendor/modernizr-3.6.0.min.js "></script>--}}

{{--<script async src="https://cse.google.com/cse.js?cx=011965659370381653902:7awkdkhs2_y"></script>--}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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

