<?php
declare(strict_types=1);

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\PersonController;
use App\Http\Controllers\v1\WormController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/reg', [AuthController::class, 'registerPage'])->name('reg');
Route::post('/reg', [AuthController::class, 'register']);
Route::get('/forgot', [AuthController::class, 'forgotPage']);
Route::post('/forgot', [AuthController::class, 'forgot']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/worm', [WormController::class, 'show'])->name('worm');
    Route::post('/worm/feed', [WormController::class, 'feed'])->name('worm.feed');

    Route::get('/person', [PersonController::class, 'show'])->name('person');
    Route::delete('/person', [PersonController::class, 'destroy'])->name('person.delete');
});
