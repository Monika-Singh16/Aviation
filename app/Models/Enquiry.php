<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'course_id',
        'first_name',
        'last_name',
        'gender',
        'height',
        'weight',
        'email',
        'mobile',
        'alternate_mobile',
        'dob',
        'nationality',
        'dgca_medical_status',
        'educational_status',
        'physics_math_12th',
        'state_id',
        'city_id',
        'message',
    ];

    protected $table = 'enquiries';
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
