<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $fillable = [
        'sub_title',
        'title',
        'infrastructure_image',
        'infrastructure_icon',
        'infrastructure_title',
        'infrastructure_description',
        'features',
        'is_active',
    ];
    
    protected $casts = [
        'features' => 'array',
    ];
    
    public $timestamps = true;
    protected $table = 'infrastructures';
}
