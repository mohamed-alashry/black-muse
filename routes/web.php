<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            \App\Http\Middleware\SetLocaleFromHeader::class
        ]
    ],
    function () {

        Route::post('/validate-register', [AuthController::class, 'validateRegister'])->name('site.validate-register');
        Route::post('/register', [AuthController::class, 'save_register'])->name('site.save_register');
        Route::post('/login', [AuthController::class, 'save_login'])->name('site.save_login');
        Route::post('/logout', [AuthController::class, 'logout'])->name('site.logout');

        Route::get('/', [SiteController::class, 'home'])->name('site.home');
        Route::get('/about-us', [SiteController::class, 'about'])->name('site.about');
        Route::get('/terms_conditions', [SiteController::class, 'terms_conditions'])->name('site.terms_conditions');

        Route::get('/our-portfolio/{id}', [PortfolioController::class, 'show'])->name('site.portfolio.show');

        Route::get('/contact-us', [SiteController::class, 'contact'])->name('site.contact');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

        ////gallery page ////
        Route::get('/gallery', [SiteController::class, 'gallery'])->name('site.gallery');


        Route::middleware(['auth:client'])->group(function () {
            //profile
            Route::get('/profile', [ClientController::class, 'profile'])->name('site.profile');
            Route::post('/profile/update-info', [ClientController::class, 'updateInfo'])->name('site.updateInfo');
            Route::post('/profile/update-password', [ClientController::class, 'updatePassword'])->name('site.updatePassword');

            //services and packages
            Route::get('/service-packages/{id}', [ServiceController::class, 'showAvailablePackages'])->name('site.service.packages');

            //service reservation
            Route::post('service/reservation/cache', [ServiceController::class, 'cacheReservation'])->name('service.reservation.cache');
            Route::get('service/reservation/confirm', [ServiceController::class, 'confirmReservation'])->name('service.reservation.confirm');

            Route::post('service/booking/store', [ServiceController::class, 'storeBooking'])->name('service.booking.store');
            Route::get('service/booking/{id}', [ServiceController::class, 'viewBooking'])->name('service.booking.show');

            Route::post('service/order/store', [ServiceController::class, 'storeOrder'])->name('service.order.store');
            Route::get('service/order/{id}', [ServiceController::class, 'viewOrder'])->name('service.order.show');

            //payments
            Route::get('payment/booking/checkout', [PaymentController::class, 'checkoutBooking'])->name('payment.booking.checkout');
            Route::get('payment/order/checkout', [PaymentController::class, 'checkoutOrder'])->name('payment.order.checkout');
            Route::put('/booking/complete/{id}', [PaymentController::class, 'completeBooking'])->name('booking.complete');

            //meeting
            Route::get('booking/meeting/confirm/{id}', [ServiceController::class, 'confirmMeeting'])->name('booking.meeting.confirm');
            Route::post('booking/meeting/available-times', [ServiceController::class, 'availableTimes']);
            Route::post('/booking/meeting/save', [ServiceController::class, 'save']);
        });

        Route::get('/payment/confirm', [PaymentController::class, 'confirm'])->name('payments.confirm');
    }
);

Route::get('/notification', function () {
    $booking = \App\Models\Booking::find(22);
    $contact = \App\Models\Contact::find(6);
    $user = \App\Models\User::find(1);

    return (new \App\Notifications\ContactReplied($contact))
        ->toMail($user);
});
