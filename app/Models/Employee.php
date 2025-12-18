<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';      // Table name
    protected $primaryKey = 'emp_id';    // Primary key

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'contact_no',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     public $timestamps = true;
     
    // Relationship: Employee belongs to a Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


}

