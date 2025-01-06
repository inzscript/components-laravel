<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Job extends Model {
    use HasFactory, Notifiable;

    // Syntax for defining the table name that uses job_listings
    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'description',
        'location',
        'salary',
    ];
}