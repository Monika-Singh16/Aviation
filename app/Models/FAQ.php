<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'question',
        'answer',
        'image',
        'is_active',
    ];

    protected $table = 'faqs';
    public $timestamps = true;

}
