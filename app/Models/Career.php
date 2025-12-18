<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'job_title',
        'job_description',
        'key_responsibilities',
        'key_process',
        'skills_qualification',
        'work_experience',
        'benefits',
        'date_opened',
        'job_type',
        'industry',
        'salary',
        'city',
        'state_province',
        'country',
        'zip_postal_code'
    ];

    protected $casts = [
        'key_responsibilities' => 'array',
        'key_process' => 'array',
        'skills_qualification' => 'array',
        'work_experience' => 'array',
        'benefits' => 'array',
    ];

    protected $table = "careers";
    public $timestamps = true;
}
