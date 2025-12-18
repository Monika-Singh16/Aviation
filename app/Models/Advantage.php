<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    protected $fillable = [
        'sub_title',
        'title',
        'short_description',
        'banner_image',
        'ratings',
        'is_active',
    ];

    protected $table = 'advantages';
    public $timestamps = true;

    protected $casts=[
        'ratings' => 'array',
    ];
}
