<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Displays all jobs listings
Route::get('/jobs', function () {
    // Get jobs from the database more efficiently eagar loading the employer
    // $jobs = Job::with('employer')->get();

    // Get jobs from the database with pagination
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    // $jobs = Job::with('employer')->cursorPaginate(5);
    // $jobs = Job::with('employer')->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function () {
    // dd($job);
    return view('jobs.create');
});

// Show
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'job_description' => 'required',
        'job_location' => 'required',
        'job_salary' => 'required'
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('job_description'),
        'location' => request('job_location'),
        'salary' => request('job_salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update 
Route::patch('/jobs/{job}', function (Job $job) {
    // validate the request
    request()->validate([
        'title' => ['required', 'min:3'],
        'job_description' => 'required',
        'job_location' => 'required',
        'job_salary' => 'required'
    ]);
    
    $job->update([
        'title' => request('title'),
        'description' => request('job_description'),
        'location' => request('job_location'),
        'salary' => request('job_salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

// Delete
Route::delete('/jobs/{job}', function (Job $job) {
    // Authorize the request
    $job->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
