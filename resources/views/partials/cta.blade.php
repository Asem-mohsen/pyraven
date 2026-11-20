<section class="section cta" aria-labelledby="cta-title">
    <div class="container cta-inner">
        <div class="cta-copy" data-reveal>
            <p class="eyebrow">{{ $eyebrow ?? __('site.home.cta_eyebrow') }}</p>
            <h2 id="cta-title">{{ __('site.cta.title') }}</h2>
            <p>{{ __('site.cta.text') }}</p>
            <a class="btn btn--primary" href="{{ lroute('contact') }}">{{ __('site.cta.button') }} <x-arrow /></a>
        </div>
        <div data-reveal style="--d: .1s">
            @include('partials.art-cta')
        </div>
    </div>
</section>
