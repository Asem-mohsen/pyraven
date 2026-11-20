<?php

namespace App\Support;

use Illuminate\Support\Facades\Route;

/**
 * English lives at the root (/about), Arabic under /ar (/ar/about).
 * Arabic routes share the English route names with an "ar." prefix.
 */
class Localization
{
    public const LOCALES = ['en' => ['dir' => 'ltr', 'og' => 'en_US'], 'ar' => ['dir' => 'rtl', 'og' => 'ar_EG']];

    public static function isRtl(?string $locale = null): bool
    {
        return (self::LOCALES[$locale ?? app()->getLocale()]['dir'] ?? 'ltr') === 'rtl';
    }

    /** Route name for the current (or given) locale. */
    public static function name(string $name, ?string $locale = null): string
    {
        return ($locale ?? app()->getLocale()) === 'ar' ? "ar.$name" : $name;
    }

    /** URL of a named page in the current (or given) locale. */
    public static function route(string $name, mixed $parameters = [], ?string $locale = null): string
    {
        return route(self::name($name, $locale), $parameters);
    }

    /** The current page in another locale; falls back to that locale's home page. */
    public static function switchUrl(string $locale): string
    {
        $current = Route::current();
        $name = $current?->getName();

        if (! $name || ! in_array($current->methods()[0] ?? 'GET', ['GET', 'HEAD'], true)) {
            return self::route('home', [], $locale);
        }

        $base = str_starts_with($name, 'ar.') ? substr($name, 3) : $name;
        $target = self::name($base, $locale);

        // Only real URL parameters (Route::view() also stores view/data/status as route parameters).
        $parameters = array_intersect_key($current->parameters(), array_flip($current->parameterNames()));

        return Route::has($target) ? route($target, $parameters) : self::route('home', [], $locale);
    }

    /** Is the current request on this page (any locale)? */
    public static function is(string $pattern): bool
    {
        return request()->routeIs($pattern, "ar.$pattern");
    }
}
