<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 
        'description'
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Role::class,                       // Related model
         'role_has_permissions',               // Pivot table 
          'permission_id',                    // Foreign key on pivot for this model (Permission)
          'role_id',                          // Foreign key on pivot for related model (Role)
           'id',                             // Local key on this model (permissions.permission_id)
            'id'                            // Local key on related model (roles.id)
        );

    }
}
