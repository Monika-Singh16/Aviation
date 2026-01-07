<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title' ,
        'sub_title',
        'description',
        'image_one',
        'image_two',
        'features',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array' 
    ];

    public $timestmps = true;
    protected $table = 'abouts';

}
