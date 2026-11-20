@extends('layouts.site')

@section('title', __('site.meta.about_title'))
@section('description', __('site.meta.about_description'))

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.about'), null]],
        'eyebrow' => __('site.about.eyebrow'),
        'title' => __('site.about.title_html'),
        'lead' => __('site.about.lead'),
        'art' => 'partials.art-about',
    ])

    <section class="section">
        <div class="container split">
            <div data-reveal>
                <p class="eyebrow">{{ __('site.about.drives_eyebrow') }}</p>
                <h2 class="h2--sm">{{ __('site.about.drives_title') }}</h2>
            </div>
            <div class="detail-list">
                @foreach (__('site.about.values') as [$title, $text])
                    <article class="detail" data-reveal style="--d: {{ $loop->index * 0.06 }}s">
                        <h3>{{ $title }}</h3>
                        <p>{{ $text }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--tight" aria-labelledby="company-title">
        <div class="container">
            <h2 id="company-title" class="sr-only">{{ __('site.about.company_details') }}</h2>
            <dl class="facts facts--4" data-reveal>
                <div><dt>{{ __('site.about.fact_company') }}</dt><dd>{{ __('site.legal_name') }}</dd></div>
                <div><dt>{{ __('site.about.fact_based') }}</dt><dd>{{ __('site.city_country') }}</dd></div>
                <div><dt>{{ __('site.contact.email') }}</dt><dd><a href="mailto:{{ config('app.email') }}" dir="ltr">{{ config('app.email') }}</a></dd></div>
                @if (filled(config('app.phone')))
                    <div><dt>{{ __('site.contact.phone') }}</dt><dd><a href="tel:{{ config('app.phone') }}" dir="ltr">{{ config('app.phone') }}</a></dd></div>
                @endif
            </dl>
        </div>
    </section>

    @include('partials.process', ['eyebrow' => __('site.nav.approach')])
    @include('partials.cta', ['eyebrow' => __('site.common.lets_collaborate')])
@endsection
