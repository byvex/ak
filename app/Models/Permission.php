<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $fillable = [
        'name',
        'guard_name',
        'description',
        'group',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($permission) {
            if ($permission->roles()->count() > 0) {
                session()->flash('error', 'Cannot delete permission - it is assigned to one or more roles');
                return false; // Prevent deletion
            }
        });
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
