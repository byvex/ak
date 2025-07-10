<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'guard_name',
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            // Prevent deletion of admin role
            if ($role->name === 'admin') {
                session()->flash('error', 'Admin role cannot be deleted');
                return false;
            }

            // Prevent deletion if role has users
            if ($role->users()->count() > 0) {
                session()->flash('error', 'Cannot delete role - it is assigned to one or more users');
                return false;
            }

            // Remove all permissions before deletion
            $role->permissions()->detach();
        });
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id')
            ->where('model_type', User::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
