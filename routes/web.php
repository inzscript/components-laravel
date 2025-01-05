<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
            'id' => 1,
            'title' => 'Director',
            'description' => 'This is a fantastic opportunity to work with a team of creative people who are passionate about technology.',
            'location' => 'London, UK',
            'salary' => '£80,000 per year'
            ], 
            [
            'id' => 2,
            'title' => 'Software Engineer',
            'description' => 'We are looking for a software engineer to join our team and help us build the next generation of our platform.',
            'location' => 'San Francisco, USA',
            'salary' => '$120,000 per year'
            ], 
            [
            'id' => 3,
            'title' => 'Product Manager',
            'description' => 'We are looking for a product manager to help us define the future of our product and drive the roadmap.',
            'location' => 'New York, USA',
            'salary' => '$100,000 per year'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
        'id' => 1,
        'title' => 'Director',
        'description' => 'This is a fantastic opportunity to work with a team of creative people who are passionate about technology.',
        'location' => 'London, UK',
        'salary' => '£80,000 per year'
        ], 
        [
        'id' => 2,
        'title' => 'Software Engineer',
        'description' => 'We are looking for a software engineer to join our team and help us build the next generation of our platform.',
        'location' => 'San Francisco, USA',
        'salary' => '$120,000 per year'
        ], 
        [
        'id' => 3,
        'title' => 'Product Manager',
        'description' => 'We are looking for a product manager to help us define the future of our product and drive the roadmap.',
        'location' => 'New York, USA',
        'salary' => '$100,000 per year'
        ]
    ];
    $job = collect($jobs)->firstWhere('id', $id);
    // dd($job);
    return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});
