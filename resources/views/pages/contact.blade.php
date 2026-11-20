@php
    $preset = request('service');
    $defaultSubject = in_array($preset, config('site.services'), true)
        ? __('site.services_page.subject_suffix', ['service' => __("site.services.$preset.title")])
        : '';
    $invalid = fn ($field) => $errors->has($field) ? 'aria-invalid=true aria-describedby='.$field.'-error' : '';
    $opt = '<span class="opt">'.e(__('site.contact.optional')).'</span>';
@endphp
@extends('layouts.site')

@section('title', __('site.meta.contact_title'))
@section('description', __('site.meta.contact_description'))

@if (\App\Rules\Turnstile::enabled())
    @push('head')
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?hl={{ app()->getLocale() }}" async defer></script>
    @endpush
@endif

@section('content')
    @include('partials.page-hero', [
        'crumbs' => [[__('site.nav.contact'), null]],
        'eyebrow' => __('site.contact.eyebrow'),
        'title' => e(__('site.contact.title')),
        'lead' => __('site.contact.lead'),
        'art' => 'partials.art-contact',
    ])

    <section class="section">
        <div class="container split">
            <aside class="sticky-col" data-reveal>
                <div class="aside-box">
                    <h2>{{ __('site.contact.reach') }}</h2>
                    <ul class="contact-list">
                        <li><span>{{ __('site.contact.email') }}</span><a href="mailto:{{ config('app.email') }}" dir="ltr">{{ config('app.email') }}</a></li>
                        @if (filled(config('app.phone')))
                            <li><span>{{ __('site.contact.phone') }}</span><a href="tel:{{ config('app.phone') }}" dir="ltr">{{ config('app.phone') }}</a></li>
                        @endif
                        <li><span>{{ __('site.contact.location') }}</span>{{ __('site.city_country') }}</li>
                    </ul>
                </div>
            </aside>

            <div data-reveal style="--d:.08s">
                @if (session('success'))
                    <div class="alert alert--success" role="status">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert--error" role="alert">
                        {{ __('site.contact.check_fields') }}
                        @foreach (['website', '_ts', 'cf-turnstile-response'] as $key)
                            @if ($errors->has($key)) <br>{{ $errors->first($key) }} @endif
                        @endforeach
                    </div>
                @endif

                <form class="form" action="{{ lroute('contact.store') }}" method="POST" data-once>
                    @csrf
                    {{-- Honeypot: hidden from people; bots fill it in --}}
                    <div class="hp-field" aria-hidden="true">
                        <label for="website">{{ __('site.contact.honeypot') }}</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off" value="">
                    </div>
                    {{-- Time trap: rejects submissions faster than a person can type --}}
                    <input type="hidden" name="_ts" value="{{ encrypt(now()->timestamp) }}">

                    <div class="form-row">
                        <div class="field">
                            <label for="name">{{ __('site.contact.name') }}</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required minlength="2" maxlength="80" autocomplete="name" {{ $invalid('name') }}>
                            @error('name')<span class="field-error" id="name-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="field">
                            <label for="email">{{ __('site.contact.work_email') }}</label>
                            <input id="email" name="email" type="email" dir="ltr" value="{{ old('email') }}" required maxlength="150" autocomplete="email" {{ $invalid('email') }}>
                            @error('email')<span class="field-error" id="email-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="field">
                            <label for="phone">{{ __('site.contact.phone_field') }} {!! $opt !!}</label>
                            <input id="phone" name="phone" type="tel" dir="ltr" value="{{ old('phone') }}" maxlength="20" pattern="^\+?[0-9\s\-()]{8,20}$" autocomplete="tel" {{ $invalid('phone') }}>
                            @error('phone')<span class="field-error" id="phone-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="field">
                            <label for="subject">{{ __('site.contact.subject') }} {!! $opt !!}</label>
                            <input id="subject" name="subject" type="text" value="{{ old('subject', $defaultSubject) }}" maxlength="120" {{ $invalid('subject') }}>
                            @error('subject')<span class="field-error" id="subject-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="field">
                        <label for="message">{{ __('site.contact.message') }}</label>
                        <textarea id="message" name="message" required minlength="20" maxlength="3000" placeholder="{{ __('site.contact.message_placeholder') }}" {{ $invalid('message') }}>{{ old('message') }}</textarea>
                        @error('message')<span class="field-error" id="message-error">{{ $message }}</span>@enderror
                    </div>

                    @if (\App\Rules\Turnstile::enabled())
                        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="dark" data-language="{{ app()->getLocale() }}"></div>
                    @endif

                    <div class="btn-row btn-row--center">
                        <button type="submit" class="btn btn--primary">{{ __('site.contact.send') }} <x-arrow /></button>
                        <p class="form-consent">{{ __('site.contact.consent') }}</p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
