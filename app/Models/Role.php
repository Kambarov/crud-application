<?php

namespace App\Models;

use App\Casts\TranslatableJson;
use App\Http\Traits\HasTranslatableField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Role extends Model
{
    use HasFactory,
        HasTranslatableField;

    protected $fillable = [
        'name',
        'permissions'
    ];

    protected $casts = [
        'name' => TranslatableJson::class,
        'permissions' => 'array'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function hasPermission($type, $permission): bool
    {
        return $this->permissions[$type][$permission] ?? false;
    }
}
