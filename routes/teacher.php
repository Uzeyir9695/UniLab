<?php

use App\Http\Controllers\Teacher\StudentsGroupController;
// use App\Http\Controllers\Teacher\Quiz\QuestionController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Teacher\GroupsController;

Route::prefix('teacher')->name('teacher.')->namespace('Teacher')->group(function () {
    Route::namespace('Auth')->group(function () {
        // Auth Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login.show');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register.show');
        Route::post('register', 'RegisterController@register')->name('register');
    });
    Route::middleware(['auth:teacher'])->group(function () {
        Route::namespace('Quiz')->group(function () {
            Route::resource('questions', QuestionController::class);
            Route::resource('tests', TestController::class);
        });

        Route::get('dashboard', function () {
            return view('teacher.dashboard.index');
        })->name('index');

        Route::resource('subjects', 'SubjectsController');
        Route::resource('groups', 'GroupsController');
        Route::get('students-groups/list/{id}', [StudentsGroupController::class, 'index'])->name('students-groups.index');
        Route::post('students-groups/list/{id}/store/', [StudentsGroupController::class, 'store'])->name('students-groups.store');
        Route::resource('students-groups', 'StudentsGroupController')->only(['destroy']);
    });
});
