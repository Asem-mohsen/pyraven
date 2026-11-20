@php($gUrl = app()->getLocale() === 'ar' ? config('site.gymivida_url_ar') : config('site.gymivida_url'))
@extends('layouts.site')

@section('title', __('site.meta.gymivida_title'))
@section('description', __('site.meta.gymivida_description'))

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.products'), lroute('products.index')], ['Gymivida', null]],
        'eyebrow' => __('site.gymivida.featured').' · '.__('site.gymivida.category'),
        'title' => 'Gymivida<span class="accent">.</span>',
        'lead' => __('site.gymivida.tagline'),
    ])

    <section class="section">
        <div class="container">
            <dl class="facts" data-reveal>
                <div><dt>{{ __('site.gymivida.fact_product') }}</dt><dd>{{ __('site.gymivida.fact_product_value') }}</dd></div>
                <div><dt>{{ __('site.gymivida.fact_market') }}</dt><dd>{{ __('site.gymivida.fact_market_value') }}</dd></div>
                <div><dt>{{ __('site.gymivida.fact_languages') }}</dt><dd>{{ __('site.gymivida.fact_languages_value') }}</dd></div>
            </dl>

            <div class="grid-2 mt-14">
                @foreach (__('site.gymivida.sides') as $side)
                    <article class="card" data-reveal style="--d: {{ $loop->index * 0.08 }}s">
                        <span class="num">{{ $side['label'] }}</span>
                        <h2 class="card-title">{{ $side['title'] }}</h2>
                        <p>{{ $side['text'] }}</p>
                        <ul class="check-list">
                            @foreach ($side['points'] as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>

            <div class="btn-row mt-36" data-reveal>
                <a class="btn btn--primary" href="{{ $gUrl }}" target="_blank" rel="noopener">{{ __('site.gymivida.visit') }} <x-arrow /><span class="sr-only">{{ __('site.common.new_tab') }}</span></a>
                <a class="btn btn--secondary" href="{{ lroute('contact') }}">{{ __('site.gymivida.similar') }} <x-arrow /></a>
            </div>
        </div>
    </section>

    <section class="section section--light" aria-labelledby="why-title">
        <div class="container split">
            <div data-reveal>
                <p class="eyebrow">{{ __('site.gymivida.why_eyebrow') }}</p>
                <h2 id="why-title" class="h2--sm">{{ __('site.gymivida.why_title') }}</h2>
            </div>
            <div data-reveal style="--d:.1s">
                <p>{{ __('site.gymivida.why_p1') }}</p>
                <p>{{ __('site.gymivida.why_p2') }}</p>
            </div>
        </div>
    </section>

    @include('partials.cta', ['eyebrow' => __('site.common.lets_collaborate')])
@endsection
