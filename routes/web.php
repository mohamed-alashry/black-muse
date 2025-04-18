<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ContactController;


Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/about-us', [SiteController::class, 'about'])->name('site.about');
Route::get('/our-portfolio', [SiteController::class, 'portfolio'])->name('site.portfolio');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('site.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
