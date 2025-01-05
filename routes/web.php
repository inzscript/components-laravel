<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // search for the job with the given id
    $job = Job::find($id);
    // dd($job);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
