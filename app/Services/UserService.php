<?php

namespace App\Services;

use App\Models\Image;
use App\Models\User;

class UserService
{
    public function __construct()
    {
        $this->image = new Image();
    }

    public function all($roleId)
    {
        $users = User::with('role')
            ->oldest('id');

        switch ($roleId) {
            case 2:
                $users = $users->whereNotIn('role_id', [2, 3])
                    ->paginate(config('app.per_page'));
                break;
            default:
                $users = $users->paginate(config('app.per_page'));
                break;
        }

        return $users;
    }

    public function create(array $attributes)
    {
        $user = User::create($attributes);

        $file = $this->image->uploadFile($attributes['image'], 'user');

        $user->image()->create([
            'url' => '/'.$file
        ]);

        return $user;
    }

    public function update(array $attributes, User $user)
    {
        $user->update($attributes);

        if (array_key_exists('image', $attributes)) {
            $user->image->removeFile();
            $user->image()->delete();

            $file = $this->image->uploadFile($attributes['image'], 'user');

            $user->image()->create([
                'url' => '/'.$file
            ]);
        }

        return $user;
    }

    public function delete(User $user)
    {
        $user->image->removeFile();
        $user->image()->delete();

        return $user->delete();
    }
}
