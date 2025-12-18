<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'is_active',
    ];

   protected $table = 'hero_sections';
    public $timestmps = true;

}
