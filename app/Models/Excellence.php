<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excellence extends Model
{   
    protected $fillable =[
        'sub_title',
        'title',
        'icon',
        'card_title',
        'card_description',
        'is_active',
    ];

    public $timestamps = true;
    protected $table = 'excellences';
}
