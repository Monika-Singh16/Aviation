<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePhase extends Model
{
    protected $fillable = [
        'course_id',
        'heading',
        'description',
        'icon',
        'title',
        'desc',	
        'features',
        'stats',	
        'stat_icon',	
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'stats' => 'array',
    ];

    protected $table = "course_phases";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
