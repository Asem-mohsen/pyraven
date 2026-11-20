@php
    use App\Support\Localization;
    $other = app()->getLocale() === 'ar' ? 'en' : 'ar';
    $links = [
        [__('site.nav.expertise'), lroute('services.index'), 'services.*'],
        [__('site.nav.products'), lroute('products.index'), 'products.*'],
        [__('site.nav.approach'), lroute('home').'#approach', null],
        [__('site.nav.about'), lroute('about'), 'about'],
        [__('site.nav.contact'), lroute('contact'), 'contact'],
    ];
@endphp
<header class="site-header">
    <nav class="nav container" aria-label="{{ __('site.nav.label') }}">
        <a class="brand" href="{{ lroute('home') }}" aria-label="{{ __('site.nav.home_label') }}">
            <img src="{{ asset('assets/img/brand/pyraven-lockup-light.png') }}" alt="{{ __('site.brand') }}" width="168" height="24">
        </a>

        <button class="nav-toggle" type="button" aria-controls="nav-menu" aria-expanded="false"
                aria-label="{{ __('site.nav.open_menu') }}"
                data-label-open="{{ __('site.nav.open_menu') }}" data-label-close="{{ __('site.nav.close_menu') }}">
            <span></span>
        </button>

        <div class="nav-menu" id="nav-menu">
            @foreach ($links as [$label, $href, $pattern])
                <a href="{{ $href }}" @if ($pattern && Localization::is($pattern)) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
            <a class="lang-switch" href="{{ Localization::switchUrl($other) }}" hreflang="{{ $other }}" lang="{{ $other }}" title="{{ __('site.nav.switch_title') }}">{{ __('site.nav.switch_label') }}</a>
            <a class="btn btn--secondary btn--sm" href="{{ lroute('contact') }}">{{ __('site.nav.lets_talk') }} <x-arrow /></a>
        </div>
    </nav>
</header>
