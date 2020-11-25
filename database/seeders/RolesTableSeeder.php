<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => [
                'ru' => 'Администратор',
                'en' => 'Administrator'
            ],
            'permissions' => [
                'posts' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ],
                'users' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ],
                'roles' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ]
            ]
        ]);

        Role::create([
            'name' => [
                'ru' => 'Модератор',
                'en' => 'Moderator'
            ],
            'permissions' => [
                'posts' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ],
                'users' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ],
                'roles' => [
                    'view'   => true
                ]
            ]
        ]);

        Role::create([
            'name' => [
                'ru' => 'Автор',
                'en' => 'Author'
            ],
            'permissions' => [
                'posts' => [
                    'view'   => true,
                    'create' => true,
                    'update' => true,
                    'delete' => true
                ]
            ]
        ]);
    }
}
