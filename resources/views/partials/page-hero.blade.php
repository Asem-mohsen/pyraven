{{-- Inner-page header. Expects: $title (trusted HTML), optional $eyebrow, $lead, $crumbs = [[label, url|null], ...], $art (partial name) --}}
<section class="page-hero @isset($art) page-hero--art @endisset">
    <div class="grid-bg" aria-hidden="true"></div>
    <div class="container page-hero-inner">
        <div class="page-hero-copy">
            @if (! empty($crumbs))
                <nav aria-label="{{ __('site.common.breadcrumb') }}">
                    <ol class="breadcrumb">
                        <li><a href="{{ lroute('home') }}">{{ __('site.common.home') }}</a></li>
                        @foreach ($crumbs as [$label, $url])
                            <li>@if ($url)<a href="{{ $url }}">{{ $label }}</a>@else<span aria-current="page">{{ $label }}</span>@endif</li>
                        @endforeach
                    </ol>
                </nav>
            @endif
            @isset($eyebrow)<p class="eyebrow" data-reveal>{{ $eyebrow }}</p>@endisset
            <h1 data-reveal style="--d:.05s">{!! $title !!}</h1>
            @isset($lead)<p class="lead" data-reveal style="--d:.1s">{{ $lead }}</p>@endisset
        </div>
        @isset($art)
            @include($art)
        @endisset
    </div>
</section>
