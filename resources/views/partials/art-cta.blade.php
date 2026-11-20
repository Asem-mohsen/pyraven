{{-- Decorative: an idea travelling through the four process steps into a product. --}}
@php($steps = __('site.process.steps'))
<div class="cta-art" aria-hidden="true">
    <svg class="cta-link" viewBox="0 0 260 160" fill="none">
        <path d="M20 30 C 120 30, 120 130, 240 130" stroke="url(#ctaGrad)" stroke-width="1.5" stroke-dasharray="4 6"/>
        <defs><linearGradient id="ctaGrad" x1="0" x2="1"><stop offset="0" stop-color="#B6AFFF"/><stop offset="1" stop-color="#8177FF"/></linearGradient></defs>
    </svg>

    <div class="panel panel--float cta-idea">
        <span class="idea-spark"></span>
        <div>
            <small>{{ __('site.cta.art_idea') }}</small>
            <i class="idea-line"></i><i class="idea-line idea-line--short"></i>
        </div>
    </div>

    <div class="panel cta-product">
        <div class="panel-top">
            <div class="lights"><i></i><i></i><i></i></div>
            <span>{{ __('site.cta.art_product') }}</span>
        </div>
        <ol class="cta-steps">
            @foreach ($steps as $i => [$title])
                <li class="{{ $i < 3 ? 'is-done' : 'is-active' }}"><i></i><span>{{ $title }}</span></li>
            @endforeach
        </ol>
        <div class="meter meter--cta"></div>
        <small class="cta-note">{{ __('site.cta.art_note') }}</small>
    </div>
</div>
