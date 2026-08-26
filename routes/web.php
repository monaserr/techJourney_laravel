<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::post('/tracks/enroll', [IndexController::class, 'enroll'])
    ->name('tracks.enroll');

    
Route::get('/tracks-fake', fn() => view('welcome'))->name('tracks');
Route::get('/resources-fake', fn() => view('welcome'))->name('resources');
Route::get('/events-fake', fn() => view('welcome'))->name('students.events');
Route::get('/instructor-events-fake', fn() => view('welcome'))->name('instructors.events.index');
Route::get('/contact', function () {
    return view('contact');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    return back()->with(
        'success',
        'Your message has been sent successfully!'
    );

})->name('contact.send');
    
})->name('contact');Route::get('/profile-fake', fn() => view('welcome'))->name('profile');
Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
