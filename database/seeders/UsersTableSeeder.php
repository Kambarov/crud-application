<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Шоакром',
            'email' => 'kambarov0209@gmail.com',
            'email_verified_at' => now(),
            'password' => 'qwerty56',
            'weekly_salary' => 26000,
            'role_id' => 1
        ])->image()->create([
            'url' => '/vendor/dashboard/images/portrait/small/avatar-s-15.jpg'
        ]);

        User::create([
            'name' => 'Артём',
            'email' => 'arxangelskiy.ar@gmail.com',
            'email_verified_at' => now(),
            'password' => 'qwerty56',
            'weekly_salary' => 20000,
            'role_id' => 2
        ])->image()->create([
            'url' => '/vendor/dashboard/images/portrait/small/avatar-s-5.jpg'
        ]);

        User::create([
            'name' => 'Юлия',
            'email' => 'bembi89@gmail.com',
            'email_verified_at' => now(),
            'password' => 'qwerty56',
            'weekly_salary' => 17000,
            'role_id' => 3
        ])->image()->create([
            'url' => '/vendor/dashboard/images/portrait/small/avatar-s-6.jpg'
        ]);
    }
}
