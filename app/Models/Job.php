<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Job extends Model {
    use HasFactory, Notifiable;

    // Syntax for defining the table name that uses job_listings
    protected $table = 'job_listings';

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'location',
    //     'salary',
    //     'employer_id',
    // ];

    // Instead of protecting the fillable fields, we can use guarded to protect the fields
    // Syntax accepts all fields
    protected $guarded = [];

    // Syntax for defining the relationship between the Job and Employer models
    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    // Syntax for defining the relationship between the Job and Tag models
    // designate foriegn pivot key to use job_listing_id
    public function tags() {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}