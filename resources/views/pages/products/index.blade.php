@extends('layouts.site')

@section('title', __('site.meta.products_title'))
@section('description', __('site.meta.products_description'))

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.products'), null]],
        'eyebrow' => __('site.products_page.eyebrow'),
        'title' => __('site.products_page.title_html'),
        'lead' => __('site.products_page.lead'),
    ])

    <section class="section">
        <div class="container">
            @include('partials.gymivida-feature')
        </div>
    </section>

    @include('partials.cta', ['eyebrow' => __('site.common.lets_collaborate')])
@endsection
