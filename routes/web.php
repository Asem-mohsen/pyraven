<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/*
| Public pages, registered once per locale:
|   English at the root  →  /about        (route name "about")
|   Arabic under /ar      →  /ar/about     (route name "ar.about")
| Use lroute('about') in views to get the URL for the current locale.
*/
$pages = function () {
    Route::view('/', 'pages.home')->name('home');

    Route::view('/services', 'pages.services.index')->name('services.index');
    Route::get('/services/{slug}', function (string $slug) {
        return view('pages.services.show', ['slug' => $slug]);
    })->whereIn('slug', config('site.services'))->name('services.show');

    Route::view('/products', 'pages.products.index')->name('products.index');
    Route::view('/products/gymivida', 'pages.products.gymivida')->name('products.gymivida');

    Route::view('/about', 'pages.about')->name('about');

    Route::view('/contact', 'pages.contact')->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])
        ->middleware('throttle:contact')
        ->name('contact.store');
};

Route::middleware(SetLocale::class.':en')->group($pages);
Route::prefix('ar')->name('ar.')->middleware(SetLocale::class.':ar')->group($pages);

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

// Old URLs from the previous site
Route::permanentRedirect('/mission', '/about');
Route::permanentRedirect('/vision', '/about');
