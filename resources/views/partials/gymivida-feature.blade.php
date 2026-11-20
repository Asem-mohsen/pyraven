@php($gUrl = app()->getLocale() === 'ar' ? config('site.gymivida_url_ar') : config('site.gymivida_url'))
<div class="feature" data-reveal>
    <div class="feature-copy">
        <span class="pill">{{ __('site.gymivida.featured') }} · {{ __('site.gymivida.category') }}</span>
        <h3 class="product-name">Gymivida<span class="accent">.</span></h3>
        <p>{{ __('site.gymivida.tagline') }}</p>
        <p class="feature-tags">{{ __('site.gymivida.tags') }}</p>
        <div class="btn-row">
            @if ($detailLink ?? true)
                <a class="btn btn--secondary" href="{{ lroute('products.gymivida') }}">{{ __('site.gymivida.explore') }} <x-arrow /></a>
            @endif
            <a class="btn btn--secondary" href="{{ $gUrl }}" target="_blank" rel="noopener">{{ __('site.gymivida.visit') }} <x-arrow /><span class="sr-only">{{ __('site.common.new_tab') }}</span></a>
        </div>
    </div>
    {{-- Illustrative mock-up, not a screenshot. Replace with approved product screenshots when available. --}}
    <div class="feature-visual" aria-hidden="true">
        <div class="mock-phone">
            <div class="ph-logo">gymivida<span class="ph-dot">.</span></div>
            <div class="ph-pic"></div>
            <div class="ph-title">{{ __('site.gymivida.mock_find') }}</div>
            <div class="ph-line ph-line--85"></div>
            <div class="ph-line ph-line--63"></div>
            <span class="ph-btn">{{ __('site.gymivida.mock_explore') }}</span>
        </div>
        <div class="mock-web">
            <div class="mw-top">{{ __('site.gymivida.mock_business') }}</div>
            <div class="mw-sub">{{ __('site.gymivida.mock_manage') }}</div>
            <div class="mw-rows"><i></i><i></i><i></i></div>
        </div>
    </div>
</div>
