<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    protected $fillable = [
        'note',
        'heading',
        'facility_url',
        'short_description',
        'image',
        'description',
        'features',
        'is_active',
    ];

    protected $casts=[
        'features' => 'array',
    ];

    public $timestamps = true;
    protected $table = 'facilities';

    public function hero()
    {
        return $this->hasOne(FacilityHero::class);
    }

    public function aircraft()
    {
        return $this->hasMany(Aircraft::class);
    }

}
