
@if(\Illuminate\Support\Facades\Session::has('subscribemsg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-height: 70px !important;">
        <p class="text-center">
            <strong >
                {{ \Illuminate\Support\Facades\Session::get('subscribemsg') }}
            </strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-family: SansSerif !important; font-size: 24px">&times;</span>
        </button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('loginerror'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-height: 70px !important;">
        <p class="text-center">
            <strong >
                {{ \Illuminate\Support\Facades\Session::get('loginerror') }}
            </strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-family:SansSerif !important; font-size: 24px">&times;</span>
        </button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('registrationerror'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-height: 70px !important;">
        <p class="text-center">
            <strong >
                {{ \Illuminate\Support\Facades\Session::get('registrationerror') }}
            </strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-family: Caput !important; font-size: 24px">&times;</span>
        </button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('subscriberror'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-height: 70px !important;">
        <p class="text-center">
            <strong >
                {{ \Illuminate\Support\Facades\Session::get('subscriberror') }}
            </strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-family: Caput !important; font-size: 24px">&times;</span>
        </button>
    </div>
@endif
