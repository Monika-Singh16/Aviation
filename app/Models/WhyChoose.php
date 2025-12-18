<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChoose extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
    ];

    protected $table = 'why_choose';
    public $timestamps = true;
}
