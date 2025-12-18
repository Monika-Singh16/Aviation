<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $fillable = [
        'title',
        'description',
        'card_1',
        'card_2',
        'card_3',
        'card_4',
        'image',
        'is_active',
    ];

    protected $table = 'vision_mission';
    public $timestamps = true;
}
