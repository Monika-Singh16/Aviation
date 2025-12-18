<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectionProcess extends Model
{
    protected $fillable = [
        'course_id',
        'heading',
        'description',
        'value'
    ];

    protected $casts=[
        'value' => 'array',
    ];
    
    protected $table = "selection_processes";
    public $timestamps = true;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
