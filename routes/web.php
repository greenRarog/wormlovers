<?php
declare(strict_types=1);

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\PersonController;
use App\Http\Controllers\v1\WormController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/reg', [AuthController::class, 'registerPage'])->name('reg');
Route::post('/reg', [AuthController::class, 'register']);
Route::get('/forgot', [AuthController::class, 'forgotPage']);
Route::post('/forgot', [AuthController::class, 'forgot']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/worm');
    })->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Письмо отправлено');
    })->middleware(['throttle:6,1'])->name('verification.send');

    Route::get('/person', [PersonController::class, 'show'])->name('person');
    Route::delete('/person', [PersonController::class, 'destroy'])->name('person.delete');


    Route::get('/worm', [WormController::class, 'show'])->name('worm');
    Route::post('/worm/feed', [WormController::class, 'feed'])
        ->middleware('verified')
        ->name('worm.feed');
});
