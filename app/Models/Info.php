<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'course_id',
        'icon',
        'title',
        'description',
        'is_active',
    ];

    protected $table = "infos";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
