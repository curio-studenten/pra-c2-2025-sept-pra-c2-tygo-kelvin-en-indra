<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hier registreer je alle web routes voor de applicatie.
|
|
| 2017-10-30 setup for urls
| Home:         /
| Brand:        /52/AEG/
| Type:         /52/AEG/53/Superdeluxe/
| Manual:       /52/AEG/53/Superdeluxe/8023/manual/
|               /52/AEG/456/Testhandle/8023/manual/
| Productcat:   /category/12/Computers/
|
*/

Route::get('/', [BrandController::class, 'index'])->name('home');

Route::get('/contact', fn() => view('pages.contact'));

Route::get('/letter', fn() => view('pages.filtered_data'));

Route::get('/greeting', fn() => view('greeting', ['name' => 'Ty']));

Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand'])->name('manual.brand');
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);
Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show']);

Route::get('/generateSitemap/', [SitemapController::class, 'generate']);
