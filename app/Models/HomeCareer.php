<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCareer extends Model
{
    protected $table = 'home_career';

    protected $fillable = [
        'heading',
        'description',
        'label',
        'value',
    ];

    protected $casts = [
        'label' => 'array',
        'value' => 'array',
    ];

    public $timestamps = true;
  
    
}
