<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class, [
    // 'only' => ['index', 'create', 'show', 'store', 'edit', 'update', 'destroy']
    // 'except' => ['edit']
]);
