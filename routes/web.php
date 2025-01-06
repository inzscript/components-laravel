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
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    // $jobs = Job::with('employer')->cursorPaginate(5);
    // $jobs = Job::with('employer')->paginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    // dd('Hello there!');
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    // search for the job with the given id
    $job = Job::find($id);
    // dd($job);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all());
    // $job = new Job();
    // $job->title = request('title');
    // $job->description = request('job_description');
    // $job->location = request('job_location');
    // $job->salary = request('job_salary');
    // $job->employer_id = 1;
    // $job->save();

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

Route::get('/contact', function () {
    return view('contact');
});
