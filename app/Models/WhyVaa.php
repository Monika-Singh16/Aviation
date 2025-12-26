<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyVaa extends Model
{
    protected $fillable = [
        'main_title',
        'main_desc',
        'image',
        'image_title',
        'image_sub_title',
        'image_sub_description',
        'is_active',
    ];

    protected $table = 'why_vaa';
    public $timestamps = true;

}

