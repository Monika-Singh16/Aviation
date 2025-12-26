<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEligibility extends Model
{
    protected $fillable = [
        'course_id',
        'eligibilities',
        'is_active',
    ];

    protected $casts=[
        'eligibilities' => 'array',
    ];

    protected $table = "course_eligibilities";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
