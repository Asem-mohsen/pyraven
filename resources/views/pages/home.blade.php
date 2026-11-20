@extends('layouts.site')

@section('title', __('site.meta.home_title'))
@section('description', __('site.meta.home_description'))

@section('content')
    <section class="hero" aria-labelledby="hero-title">
        <div class="grid-bg" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div>
                <p class="eyebrow" data-reveal><span class="dot" aria-hidden="true"></span> {{ __('site.home.eyebrow') }}</p>
                <h1 id="hero-title" data-reveal style="--d: .05s">{!! __('site.home.title_html') !!}</h1>
                <p class="lead" data-reveal style="--d: .1s">{{ __('site.home.lead') }}</p>
                <div class="btn-row" data-reveal style="--d: .15s">
                    <a class="btn btn--primary" href="{{ lroute('contact') }}">{{ __('site.home.start') }} <x-arrow /></a>
                    <a class="btn btn--secondary" href="#products">{{ __('site.home.explore') }} <x-arrow /></a>
                </div>
                <p class="hero-note" data-reveal style="--d: .2s">{{ __('site.home.note') }}</p>
            </div>
            @include('partials.hero-art')
        </div>
    </section>

    <div class="strip">
        <div class="container strip-inner">
            <span class="strip-label">{{ __('site.home.strip_label') }}</span>
            @foreach (__('site.home.capabilities') as $capability)
                <b>{{ $capability }}</b>
            @endforeach
        </div>
    </div>

    <section class="section" id="expertise" aria-labelledby="expertise-title">
        <div class="container">
            <div class="section-head" data-reveal>
                <div>
                    <p class="eyebrow">{{ __('site.home.expertise_eyebrow') }}</p>
                    <h2 id="expertise-title">{!! __('site.home.expertise_title_html') !!}</h2>
                </div>
                <p>{{ __('site.home.expertise_text') }}</p>
            </div>
            <div class="grid-3">
                @foreach (config('site.services') as $slug)
                    @php($s = __("site.services.$slug"))
                    <a class="card" href="{{ lroute('services.show', $slug) }}" data-reveal style="--d: {{ $loop->index * 0.08 }}s">
                        <span class="num">{{ sprintf('%02d', $loop->iteration) }} / {{ $s['verb'] }}</span>
                        <h3>{{ $s['title'] }}</h3>
                        <p>{{ $s['summary'] }}</p>
                        <span class="text-link">{{ __('site.common.learn_more') }} <x-arrow /></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--tight" id="products" aria-labelledby="products-title">
        <div class="container">
            <div class="section-head" data-reveal>
                <div>
                    <p class="eyebrow">{{ __('site.home.products_eyebrow') }}</p>
                    <h2 id="products-title">{!! __('site.home.products_title_html') !!}</h2>
                </div>
                <p>{{ __('site.home.products_text') }}</p>
            </div>
            @include('partials.gymivida-feature')
        </div>
    </section>

    @include('partials.process')
    @include('partials.cta')
@endsection
