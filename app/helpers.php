<?php

use App\Support\Localization;

if (! function_exists('lroute')) {
    /** Localized route URL: lroute('about') → /about or /ar/about. */
    function lroute(string $name, mixed $parameters = []): string
    {
        return Localization::route($name, $parameters);
    }
}
