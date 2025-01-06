<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // Get jobs from the database more efficiently eagar loading the employer
    // $jobs = Job::with('employer')->get();

    // Get jobs from the database with pagination
    $jobs = Job::with('employer')->simplePaginate(5);
    // $jobs = Job::with('employer')->cursorPaginate(5);
    // $jobs = Job::with('employer')->paginate(5);

    return view('jobs', [
        'jobs' => $jobs
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
