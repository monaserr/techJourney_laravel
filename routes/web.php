<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Instructor\EventController as InstructorEventController;
use App\Http\Controllers\Student\EventController as StudentEventController;
use Illuminate\Http\Request;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::post('/tracks/enroll', [IndexController::class, 'enroll'])
    ->name('tracks.enroll');

Route::get('/tracks-fake', fn() => view('welcome'))
    ->name('tracks');

Route::get('/resources-fake', fn() => view('welcome'))
    ->name('resources');

Route::get('/student/events', [StudentEventController::class, 'index'])
    ->name('student.events.index');

Route::post('/student/events/register', [StudentEventController::class, 'register'])
    ->name('student.events.register');

Route::middleware('auth')->group(function () {

    Route::get('/instructor/events/create', [InstructorEventController::class, 'create'])
        ->name('instructor.events.create');

    Route::post('/instructor/events', [InstructorEventController::class, 'store'])
        ->name('instructor.events.store');

    Route::get('/instructor/events/{event}/edit', [InstructorEventController::class, 'edit'])
        ->name('instructor.events.edit');

    Route::put('/instructor/events/{event}', [InstructorEventController::class, 'update'])
        ->name('instructor.events.update');

    Route::delete('/instructor/events/{event}', [InstructorEventController::class, 'destroy'])
        ->name('instructor.events.destroy');
});

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

Route::get('/profile-fake', fn() => view('welcome'))
    ->name('profile');

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');