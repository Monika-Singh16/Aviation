<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacilityHero extends Model
{
    use HasFactory;

    // 👇 Table name (because it's not plural)
    protected $table = 'facility_hero';
    public $timestamps = true;

    // 👇 Mass assignable fields
    protected $fillable = [
        'heading',
        'desc',
        'image',
        'facility_id',
        'stat',
        'is_active',
    ];

    // 👇 Cast JSON & boolean automatically
    protected $casts = [
        'stat'      => 'array',
        'is_active' => 'boolean',
    ];

    // 👇 Relation: FacilityHero belongs to Facility
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
