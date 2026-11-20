<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SeoTest extends TestCase
{
    private const PATHS = ['/', '/services', '/services/custom-software', '/services/mobile-apps', '/services/saas-integrations',
        '/products', '/products/gymivida', '/about', '/contact'];

    public static function pages(): array
    {
        $rows = [];
        foreach (self::PATHS as $path) {
            $rows["en $path"] = [$path, 'en'];
            $rows["ar $path"] = [$path === '/' ? '/ar' : '/ar'.$path, 'ar'];
        }

        return $rows;
    }

    #[DataProvider('pages')]
    public function test_page_renders_with_seo_basics(string $url, string $locale): void
    {
        $html = $this->get($url)->assertOk()->getContent();
        $dir = $locale === 'ar' ? 'rtl' : 'ltr';

        $this->assertStringContainsString("<html lang=\"$locale\" dir=\"$dir\">", $html);
        $this->assertSame(1, substr_count($html, '<h1'), "$url should have exactly one h1");
        $this->assertMatchesRegularExpression('/<meta name="description" content="[^"]{50,}">/u', $html);
        $this->assertStringContainsString('rel="canonical"', $html);
        $this->assertStringContainsString('hreflang="en"', $html);
        $this->assertStringContainsString('hreflang="ar"', $html);
        $this->assertStringContainsString('hreflang="x-default"', $html);
        $this->assertStringContainsString('application/ld+json', $html);
        $this->assertStringNotContainsString('&amp;amp;', $html);
        $this->assertStringNotContainsString('site.', strip_tags($html), "$url shows an untranslated key");
    }

    public function test_arabic_pages_contain_arabic_and_link_back_to_english(): void
    {
        $html = $this->get('/ar/about')->getContent();

        $this->assertMatchesRegularExpression('/\p{Arabic}{3,}/u', strip_tags($html));
        $this->assertStringContainsString('href="'.url('/about').'" hreflang="en" lang="en"', $html);
        $this->assertStringContainsString('IBM+Plex+Sans+Arabic', $html);
    }

    public function test_language_switch_keeps_the_same_page(): void
    {
        $this->get('/services/mobile-apps')->assertSee('href="'.url('/ar/services/mobile-apps').'" hreflang="ar"', false);
    }

    public function test_titles_are_unique_per_language(): void
    {
        foreach (['en', 'ar'] as $locale) {
            $titles = [];
            foreach (self::pages() as [$url, $l]) {
                if ($l !== $locale) {
                    continue;
                }
                preg_match('#<title>(.*?)</title>#u', $this->get($url)->getContent(), $m);
                $titles[] = $m[1];
            }
            $this->assertSame(count($titles), count(array_unique($titles)), "duplicate $locale titles");
        }
    }

    public function test_phone_number_is_shown_on_contact_pages(): void
    {
        config(['app.phone' => '+20102788933']);

        foreach (['/contact', '/ar/contact', '/about'] as $url) {
            $this->get($url)->assertSee('href="tel:+20102788933"', false);
        }
    }

    public function test_banner_artwork_on_about_and_contact(): void
    {
        $this->get('/about')->assertSee('page-art--about', false);
        $this->get('/contact')->assertSee('page-art--contact', false);
        $this->get('/ar/contact')->assertSee('page-art--contact', false);
    }

    public function test_old_urls_redirect_permanently(): void
    {
        $this->get('/mission')->assertStatus(301)->assertRedirect('/about');
        $this->get('/vision')->assertStatus(301)->assertRedirect('/about');
    }

    public function test_unknown_pages_are_404_in_the_right_language(): void
    {
        $this->get('/services/blockchain')->assertNotFound()->assertSee('lang="en"', false);
        $this->get('/ar/services/blockchain')->assertNotFound()->assertSee('lang="ar" dir="rtl"', false);
    }

    public function test_sitemap_lists_both_languages(): void
    {
        $xml = $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml; charset=UTF-8')->getContent();

        foreach (self::pages() as [$url]) {
            $this->assertStringContainsString('<loc>'.url($url).'</loc>', $xml);
        }
        $this->assertStringContainsString('hreflang="ar"', $xml);
    }

    public function test_contact_page_prefills_subject_from_service(): void
    {
        $this->get('/contact?service=mobile-apps')->assertSee('value="Mobile Experiences project"', false);
        $this->get('/ar/contact?service=mobile-apps')->assertSee('value="مشروع تجارب الجوال"', false);
    }
}
