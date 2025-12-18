<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    //
    protected $fillable = [
        'icon',
        'heading',
        'sub_heading',
        'short_description',
        'label',
        'value',
        'title',
        'sub_title',
        'image',
        'description',
        'label_1',
        'value_1',
        'features',
        'color'
    ];
    
    protected $casts = [
        'label' => 'array',
        'value' => 'array',
        'label_1' => 'array',
        'value_1' => 'array',
        'features' => 'array',
    ];


    protected $table = 'highlights';
        public $timestamps = true;
}
