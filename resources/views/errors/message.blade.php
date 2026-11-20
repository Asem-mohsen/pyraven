@php
    // Error pages render outside the locale middleware: pick the language from the URL.
    if (request()->segment(1) === 'ar') {
        app()->setLocale('ar');
    }
@endphp
@extends('layouts.site')

@section('title', __("site.meta.$titleKey"))
@section('robots', 'noindex, follow')

@section('content')
    <section class="section error-page">
        <div class="container">
            <p class="eyebrow">{{ $code }}</p>
            <h1 class="h1--sm">{{ __("site.errors.{$code}_title") }}</h1>
            <p>{{ __("site.errors.{$code}_text") }}</p>
            <div class="btn-row btn-row--justify mt-24">
                <a class="btn btn--primary" href="{{ lroute('home') }}">{{ __('site.errors.back_home') }} <x-arrow /></a>
                <a class="btn btn--secondary" href="{{ lroute('contact') }}">{{ __('site.errors.contact_us') }} <x-arrow /></a>
            </div>
        </div>
    </section>
@endsection
