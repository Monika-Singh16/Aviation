<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Strength extends Model
{
    protected $fillable = [
        'sub_title',
        'title',
        'card_icon',
        'card_title',
        'card_description',
        'is_active',
    ];

    protected $table = 'strengths';
    public $timestamps = true;
}
