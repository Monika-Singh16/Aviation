<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPilot extends Model
{
    protected $fillable = [
        'title',
        'description',
        'card_title',
        'card_description',
        'image',
        'is_active',
    ];

    protected $table = 'career_pilot';
    public $timestamps = true;
}
