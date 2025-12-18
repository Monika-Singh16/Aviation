<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'course_url',
        'duration',
        'description',
        'image',
    ];

    protected $table = "courses";
    public $timestamps = true;

    public function coursePhases()
    {
        return $this->hasMany(CoursePhase::class);
    }

    public function courseEligibilities()
    {
        return $this->hasMany(CourseEligibility::class);
    }

    public function selectionProcesses()
    {
        return $this->hasMany(SelectionProcess::class);
    }
}
