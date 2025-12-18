<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'banner_image',
        'about_image',
        'title',
        'heading',
        'description',
        'sub_title',
        'number',
        'is_active',
    ];

    protected $table = 'about_pages';
    public $timestamps = true;
}
