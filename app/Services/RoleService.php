<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function all()
    {
        return Role::oldest('id')
            ->paginate(config('app.per_page'));
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
