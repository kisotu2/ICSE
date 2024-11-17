<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify' => true]); // Enable email verification routes


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Registration and OTP routes
Route::post('/register/send-otp', [OTPController::class, 'sendOtp'])->name('register.sendOtp');
Route::get('/register/verify-otp', function () {
    return view('auth.verify-otp');
})->name('otp.verify');
Route::post('/register/verify-otp', [OTPController::class, 'verifyOtp'])->name('register.verifyOtp');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
