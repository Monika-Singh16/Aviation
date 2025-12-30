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

    public function courseEligibility()
    {
        return $this->hasMany(CourseEligibility::class);
    }

    public function selectionProcesses()
    {
        return $this->hasMany(SelectionProcess::class);
    }

    public function courseAbout()
    {
        return $this->hasMany(CourseAbout::class);
    }

    public function infos()
    {
        return $this->hasMany(Info::class);
    }

    public function contactForms()
    {
        return $this->hasMany(ContactForm::class);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}
