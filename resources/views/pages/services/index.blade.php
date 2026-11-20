@extends('layouts.site')

@section('title', __('site.meta.services_title'))
@section('description', __('site.meta.services_description'))

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.expertise'), null]],
        'eyebrow' => __('site.services_page.eyebrow'),
        'title' => __('site.services_page.title_html'),
        'lead' => __('site.services_page.lead'),
    ])

    <section class="section">
        <div class="container">
            <div class="grid-3">
                @foreach (config('site.services') as $slug)
                    @php($s = __("site.services.$slug"))
                    <a class="card" href="{{ lroute('services.show', $slug) }}" data-reveal style="--d: {{ $loop->index * 0.08 }}s">
                        <span class="num">{{ sprintf('%02d', $loop->iteration) }} / {{ $s['verb'] }}</span>
                        <h2 class="card-title">{{ $s['title'] }}</h2>
                        <p>{{ $s['summary'] }}</p>
                        <ul class="check-list card-list">
                            @foreach (array_slice($s['blocks'], 0, 3) as [$blockTitle])
                                <li>{{ $blockTitle }}</li>
                            @endforeach
                        </ul>
                        <span class="text-link">{{ __('site.common.learn_more') }} <x-arrow /></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.process', ['eyebrow' => __('site.services_page.how_we_work')])
    @include('partials.cta', ['eyebrow' => __('site.common.lets_collaborate')])
@endsection
