<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('assets/img/brand/pyraven-lockup-light.png') }}" alt="{{ __('site.brand') }}" width="154" height="22" loading="lazy">
                <p>{{ __('site.footer.about') }}</p>
            </div>

            <div class="footer-col">
                <h2>{{ __('site.footer.expertise') }}</h2>
                <ul>
                    @foreach (config('site.services') as $slug)
                        <li><a href="{{ lroute('services.show', $slug) }}">{{ __("site.services.$slug.title") }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer-col">
                <h2>{{ __('site.footer.company') }}</h2>
                <ul>
                    <li><a href="{{ lroute('products.index') }}">{{ __('site.nav.products') }}</a></li>
                    <li><a href="{{ lroute('products.gymivida') }}">Gymivida</a></li>
                    <li><a href="{{ lroute('about') }}">{{ __('site.nav.about') }}</a></li>
                    <li><a href="{{ lroute('contact') }}">{{ __('site.nav.contact') }}</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h2>{{ __('site.footer.touch') }}</h2>
                <ul>
                    <li><a href="mailto:{{ config('app.email') }}" dir="ltr">{{ config('app.email') }}</a></li>
                    @if (filled(config('app.phone')))
                        <li><a href="tel:{{ config('app.phone') }}" dir="ltr">{{ config('app.phone') }}</a></li>
                    @endif
                    @foreach (['linkedin_url' => 'LinkedIn', 'facebook_url' => 'Facebook', 'instagram_url' => 'Instagram'] as $key => $label)
                        @if (filled(config("app.social_media.$key")))
                            <li><a href="{{ config("app.social_media.$key") }}" target="_blank" rel="noopener">{{ $label }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>&copy; {{ now()->year }} {{ __('site.legal_name') }} · {{ __('site.city_country') }}</span>
            <span>{{ __('site.tagline') }}</span>
        </div>
    </div>
</footer>
