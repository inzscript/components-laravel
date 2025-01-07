<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;


class JobController extends Controller
{
    public function index() {
        // Jobs with pagination
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'job_description' => 'required',
            'job_location' => 'required',
            'job_salary' => 'required'
        ]);
    
        $job = Job::create([
            'title' => request('title'),
            'description' => request('job_description'),
            'location' => request('job_location'),
            'salary' => request('job_salary'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->send(new JobPosted($job));
    
        return redirect('/jobs');
    }

    public function edit(Job $job) {
        // Authorize the request
        // Gate::authorize('edit-job', $job);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job) {
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
    }

    public function destroy(Job $job) {
        // Authorize the request
        $job->delete();
        return redirect('/jobs');
    }
}
