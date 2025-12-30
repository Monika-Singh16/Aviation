<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'email',
        'phone',
        'source',
        'message',
    ];

    protected $table = 'contact_forms';
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
