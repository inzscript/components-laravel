<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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
    
        Job::create([
            'title' => request('title'),
            'description' => request('job_description'),
            'location' => request('job_location'),
            'salary' => request('job_salary'),
            'employer_id' => 1
        ]);
    
        return redirect('/jobs');
    }

    public function edit(Job $job) {
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
