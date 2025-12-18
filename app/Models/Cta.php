<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cta extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'is_active',
    ];

    protected $table = 'ctas';
    public $timestamps = true;
}
