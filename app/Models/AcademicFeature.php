<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicFeature extends Model
{
    protected $fillable = [
        'sub_title',
        'title',
        'vihanga_type',
        'vihanga_bool',
        'vihanga_text',
        'other_type',
        'other_bool',
        'other_text',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'vihanga_bool' => 'boolean',
        'other_bool'   => 'boolean',
    ];

    public $timestamps = true;
    protected $table = 'academic_features';
}
