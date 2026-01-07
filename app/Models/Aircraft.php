<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $fillable = [
        'title',
        'facility_id',
        'desc',
        'features',
        'is_active',
    ];

    protected $table = 'aircrafts';
    public $timestamps = true;

    protected $casts = [
        'features'    => 'array',
        'is_active'   => 'boolean',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    
}
