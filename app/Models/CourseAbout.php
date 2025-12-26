<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAbout extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'image_1',
        'image_2',
        'image_3',
        'is_active',
    ];

    protected $table = 'course_abouts';
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
