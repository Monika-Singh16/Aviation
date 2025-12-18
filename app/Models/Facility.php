<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    protected $fillable = [
        'heading',
        'short_description',
        'image',
        'description'
    ];

    public $timestamps = true;
    protected $table = 'facilities';
}
