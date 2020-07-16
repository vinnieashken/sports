<style>
    .cookie-btn {
        color: #fff!important;
        background: #38ab44;
    }
</style>

<div class="container fixed-bottom">
    <div class="alert bg-black js-cookie-consent cookie-consent">

        <div class="text-white cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!}
        </div>
     <div class="d-flex ">
        <button class="btn cookie-btn js-cookie-consent-agree cookie-consent__agree ml-auto">
            {{ trans('cookieConsent::texts.agree') }}
        </button>
     </div>
    </div>
</div>
