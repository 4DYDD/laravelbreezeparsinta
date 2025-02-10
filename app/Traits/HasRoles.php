<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function assignRole(Role $role): Model
    {
        return $this->roles()->save($role);
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isPartner(): bool
    {
        return $this->hasRole('partner');
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }
}