@php
    $service = __("site.services.$slug");
    $number = sprintf('%02d', array_search($slug, config('site.services'), true) + 1);
@endphp
@extends('layouts.site')

@section('title', __('site.meta.service_title', ['service' => $service['title']]))
@section('description', $service['meta'])

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.expertise'), lroute('services.index')], [$service['title'], null]],
        'eyebrow' => $number.' / '.$service['verb'],
        'title' => e($service['title']),
        'lead' => $service['intro'],
    ])

    <section class="section">
        <div class="container split">
            <aside class="sticky-col" data-reveal>
                <div class="aside-box">
                    <h2>{{ __('site.services_page.what_you_get') }}</h2>
                    <ul class="check-list">
                        @foreach ($service['deliverables'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <a class="btn btn--primary btn--block" href="{{ lroute('contact', ['service' => $slug]) }}">{{ __('site.services_page.discuss') }} <x-arrow /></a>
                </div>
            </aside>
            <div class="detail-list">
                @foreach ($service['blocks'] as [$title, $text])
                    <article class="detail" data-reveal style="--d: {{ $loop->index * 0.06 }}s">
                        <h2>{{ $title }}</h2>
                        <p>{{ $text }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--tight" aria-labelledby="other-title">
        <div class="container">
            <h2 id="other-title" class="h2--xs" data-reveal>{{ __('site.services_page.more') }}</h2>
            <div class="grid-2 mt-24">
                @foreach (array_values(array_diff(config('site.services'), [$slug])) as $otherSlug)
                    @php($o = __("site.services.$otherSlug"))
                    <a class="card" href="{{ lroute('services.show', $otherSlug) }}" data-reveal style="--d: {{ $loop->index * 0.08 }}s">
                        <span class="num">{{ sprintf('%02d', array_search($otherSlug, config('site.services'), true) + 1) }} / {{ $o['verb'] }}</span>
                        <h3 class="card-title card-title--compact">{{ $o['title'] }}</h3>
                        <p>{{ $o['summary'] }}</p>
                        <span class="text-link">{{ __('site.common.learn_more') }} <x-arrow /></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta', ['eyebrow' => __('site.common.lets_collaborate')])
@endsection
