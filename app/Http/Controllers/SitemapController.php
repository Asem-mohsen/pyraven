<?php

namespace App\Http\Controllers;

use App\Support\Localization;

class SitemapController extends Controller
{
    public function __invoke()
    {
        $pages = [
            ['home', []],
            ['services.index', []],
            ...array_map(fn ($slug) => ['services.show', ['slug' => $slug]], config('site.services')),
            ['products.index', []],
            ['products.gymivida', []],
            ['about', []],
            ['contact', []],
        ];
        $lastmod = date('Y-m-d', max(filemtime(lang_path('en/site.php')), filemtime(lang_path('ar/site.php'))));

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n"
            .'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">'."\n";

        foreach ($pages as [$name, $params]) {
            $alternates = '';
            foreach (array_keys(Localization::LOCALES) as $alt) {
                $alternates .= '    <xhtml:link rel="alternate" hreflang="'.$alt.'" href="'.e(Localization::route($name, $params, $alt)).'"/>'."\n";
            }
            foreach (array_keys(Localization::LOCALES) as $locale) {
                $xml .= "  <url>\n    <loc>".e(Localization::route($name, $params, $locale))."</loc>\n    <lastmod>$lastmod</lastmod>\n$alternates  </url>\n";
            }
        }

        return response($xml."</urlset>\n", 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
