<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';   // Table name

    protected $fillable = [
        'name',          // Role name, e.g., Admin, Manager, Employee
    ];

     public $timestamps = true;
     
    // Relationship: Role has many Employees
    public function employees()
    {
        return $this->hasMany(Employee::class, 'role_id');
    }

    // Optional: Role has many permissions through pivot
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 
        'role_has_permissions',   // Pivot table
         'role_id',                     // Foreign key on pivot for this model
          'permission_id' ,              // Foreign key on pivot for related model
          'id',                       // Local key on this model (roles.id)
        'id'             // Local key on related model (permissions.permission_id)
        );
    }
}
