<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEligibility extends Model
{
    protected $fillable = [
        'course_id',
        'heading',
        'description',
        'value'
    ];

    protected $casts=[
        'value' => 'array',
    ];

    protected $table = "course_eligibilities";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
