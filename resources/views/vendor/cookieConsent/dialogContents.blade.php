<div class="container fixed-bottom">
    <div class="alert bg-black js-cookie-consent cookie-consent">

        <div class="text-white cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!}
        </div>

        <button class="btn green js-cookie-consent-agree cookie-consent__agree">
            {{ trans('cookieConsent::texts.agree') }}
        </button>

    </div>
</div>
