@php
    use App\Support\Localization;
    $locale = app()->getLocale();
    $rtl = Localization::isRtl();
    $siteName = __('site.brand');
    // Blade escapes section content; decode once so {{ }} below escapes exactly once.
    $yield = fn ($key, $default) => html_entity_decode(trim($__env->yieldContent($key, $default)), ENT_QUOTES);
    $pageTitle = $yield('title', __('site.meta.default_title'));
    $pageDescription = $yield('description', __('site.meta.default_description'));
    $canonical = $yield('canonical', url()->current());
    $ogImage = asset('assets/img/brand/og-image.jpg');
    $v = fn ($path) => asset($path).'?v='.(@filemtime(public_path($path)) ?: '1');
    $indexable = trim($__env->yieldContent('robots', 'index, follow')) === 'index, follow';
@endphp
<!doctype html>
<html lang="{{ $locale }}" dir="{{ $rtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <link rel="canonical" href="{{ $canonical }}">
    @if ($indexable && Route::current()?->getName())
        @foreach (array_keys(Localization::LOCALES) as $alt)
            <link rel="alternate" hreflang="{{ $alt }}" href="{{ Localization::switchUrl($alt) }}">
        @endforeach
        <link rel="alternate" hreflang="x-default" href="{{ Localization::switchUrl('en') }}">
    @endif
    <meta name="theme-color" content="#090E1B">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('assets/img/brand/favicon-32.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:locale" content="{{ Localization::LOCALES[$locale]['og'] }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">

    <meta name="google-site-verification" content="xOva911aDkod-0Qs6chbOTS3oTdPdB_edm9Tvtsj7Fo">
    <meta name="facebook-domain-verification" content="4qws42xbicnldfuzdg1ig32xvhz91v">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if ($rtl)
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,700&display=swap">
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&family=Space+Grotesk:wght@500;600;700&display=swap">
    @endif
    <link rel="stylesheet" href="{{ $v('assets/site/site.css') }}">
    <script>document.documentElement.classList.add('js')</script>

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => __('site.legal_name'),
        'alternateName' => $siteName,
        'url' => url('/'),
        'logo' => asset('assets/img/brand/pyraven-logo-light.png'),
        'email' => config('app.email'),
        'telephone' => config('app.phone'),
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => config('site.city'), 'addressCountry' => config('site.country_code')],
        'sameAs' => array_values(array_filter(config('app.social_media', []))),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}
    </script>
    @stack('head')
</head>
<body>
    <a class="skip-link" href="#main">{{ __('site.nav.skip') }}</a>

    @include('partials.header')

    <main id="main" tabindex="-1">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ $v('assets/site/site.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
