{{-- Decorative: an inquiry being composed, with the real contact channels floating beside it. --}}
<div class="page-art page-art--contact" aria-hidden="true">
    <div class="orbit orbit--sm"></div>
    <div class="panel art-compose">
        <div class="panel-top">
            <div class="lights"><i></i><i></i><i></i></div>
            <span>{{ __('site.contact.art_new') }}</span>
        </div>
        <div class="compose-field"><small>{{ __('site.contact.art_project') }}</small><i class="w-70"></i></div>
        <div class="compose-field"><small>{{ __('site.contact.art_timeline') }}</small><i class="w-45"></i></div>
        <div class="compose-lines"><i></i><i class="w-90"></i><i class="w-60"></i></div>
        <span class="compose-send">{{ __('site.contact.art_send') }} <x-arrow /></span>
    </div>
    <div class="panel panel--float art-card art-card--mail">
        <small>{{ __('site.contact.email') }}</small>
        <b dir="ltr">{{ config('app.email') }}</b>
    </div>
    @if (filled(config('app.phone')))
        <div class="panel panel--float art-card art-card--phone">
            <small>{{ __('site.contact.phone') }}</small>
            <b dir="ltr">{{ config('app.phone') }}</b>
        </div>
    @endif
    <div class="art-pill"><i class="art-check"></i>{{ __('site.contact.art_sent') }}</div>
</div>
