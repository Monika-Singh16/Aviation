<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePhase extends Model
{
    protected $fillable = [
        'course_id',
        'heading',
        'description',
        'image'
    ];

    protected $table = "course_phases";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
