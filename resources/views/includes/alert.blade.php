
@if(\Illuminate\Support\Facades\Session::has('subscribemsg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-height: 70px !important;">
        <p class="text-center">
            <strong >
                {{ \Illuminate\Support\Facades\Session::get('subscribemsg') }}
            </strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
