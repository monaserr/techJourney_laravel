<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::post('/tracks/enroll', [IndexController::class, 'enroll'])
    ->name('tracks.enroll');

    
Route::get('/tracks-fake', fn() => view('welcome'))->name('tracks');
Route::get('/resources-fake', fn() => view('welcome'))->name('resources');
Route::get('/events-fake', fn() => view('welcome'))->name('students.events');
Route::get('/instructor-events-fake', fn() => view('welcome'))->name('instructors.events.index');
Route::get('/contact-fake', fn() => view('welcome'))->name('contact');
Route::get('/profile-fake', fn() => view('welcome'))->name('profile');
Route::get('/login-fake', fn() => view('welcome'))->name('login');
Route::post('/logout-fake', fn() => view('welcome'))->name('logout');