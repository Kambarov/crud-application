<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function all($roleId)
    {
        $roles = Role::oldest('id');

        switch ($roleId) {
            case 2:
                $roles = $roles->whereNotIn('id', [2, 3])
                    ->paginate(config('app.per_page'));
                break;
            default:
                $roles = $roles->paginate(config('app.per_page'));
        }

        return $roles;
    }

    public function create(array $attributes)
    {
        return Role::create($attributes);
    }

    public function update(array $attributes, Role $role)
    {
        return $role->update($attributes);
    }

    public function delete(Role $role)
    {
        return $role->delete();
    }
}
