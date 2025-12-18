<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title' ,
        'sub_title',
        'description_1',
        'image',
        'image_one',
        'image_two',
        'image_three',
        'description_2',
        'features'
    ];

    protected $casts = [
        'features' => 'array' 
    ];

    public $timestmps = true;
    protected $table = 'abouts';

}
