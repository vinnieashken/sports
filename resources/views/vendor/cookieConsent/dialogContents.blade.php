<style>
    .cookie-btn {
        color: #fff!important;
        background: #38ab44;
    }
</style>

<div class="container fixed-bottom">
    <div class="alert bg-black js-cookie-consent cookie-consent">

        <span class="text-white cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!}
        </span>

        <button class="btn cookie-btn js-cookie-consent-agree cookie-consent__agree ">
            {{ trans('cookieConsent::texts.agree') }}
        </button>
    </div>
</div>
