<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Mail;

Route::get('test-email', function () {
    $job = Job::first();
    // Mail::to('inzscript@gmail.com')->send(new App\Mail\JobPosted());
    // return new App\Mail\JobPosted();

    // Dispatch email request to the queue in the database.
    // dispatch(function () {
    //     logger('Dispatched job');
    // });

    // Use a dispatched dedicated job to queue the email request.
    \App\Jobs\TranslateJob::dispatch($job);

    Return 'Dispatched job';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);

Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);