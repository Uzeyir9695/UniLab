<?php
use Illuminate\Support\Facades\Route;

Route::prefix('student')->name('student.')->namespace('Student')->group(function () {
    Route::namespace('Auth')->group(function () {
        // Auth Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login.show');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register.show');
        Route::post('register', 'RegisterController@register')->name('register');
    });
    Route::middleware([
        'auth:student'
    ])->group(function () {
        Route::get('dashboard', function () {
            return view('student.dashboard.index');
        })->name('dashboard.index');
    });
});
