<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable =[
        'sub_title',
        'title',
        'icon',
        'text',
    ];

    protected $casts = [
        'text' => 'array',
    ];

    public $timestamps = true;
    protected $table = 'records';
}
