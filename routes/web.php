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

// Displays the form to create a new job listing
Route::get('/jobs/create', function () {
    // dd('Hello there!');
    return view('jobs.create');
});

// Displays a single job listing
Route::get('/jobs/{id}', function ($id) {
    // search for the job with the given id
    $job = Job::find($id);
    // dd($job);
    return view('jobs.show', ['job' => $job]);
});

// Saves the new job listing to the database
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

// Edit a job listing
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update a job listing
Route::patch('/jobs/{id}', function ($id) {
    // validate the request
    request()->validate([
        'title' => ['required', 'min:3'],
        'job_description' => 'required',
        'job_location' => 'required',
        'job_salary' => 'required'
    ]);

    // Find job and check if it exists
    $job = Job::findOrFail($id);
    
    $job->update([
        'title' => request('title'),
        'description' => request('job_description'),
        'location' => request('job_location'),
        'salary' => request('job_salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

// Delete a job listing
Route::delete('/jobs/{id}', function ($id) {
    // Authorize the request 
    // Find job and check if it exists
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
