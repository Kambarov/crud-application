<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /*
     * The list of posts
     */
    public function testGetUserList()
    {
        Artisan::call('migrate:fresh --seed');
        $user = User::first();

        $response = $this->actingAs($user)
            ->get('dashboard/users');

        $response
            ->assertViewHas([
                'users' => User::with('image', 'role')
                    ->oldest('id')
                    ->paginate(config('app.per_page'))
            ]);
    }

    public function testSuccessValidation()
    {
//
//        Runs everytime when we try to run test
//
        Artisan::call('optimize:clear');
        Artisan::call('migrate:fresh --seed');
        $user = User::find(1);
        $roleId = rand(1, 3);

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->postJson('dashboard/users', [
                'name' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => 'qwerty56',
                'weekly_salary' => 12000,
                'role_id' => $roleId,
                'image' => UploadedFile::fake()->image('random.jpg')
            ]);

        $response
            ->assertOk();
    }

    public function testValidationFails()
    {
        Artisan::call('migrate:fresh --seed');
        $user = User::first();

        $response = $this->actingAs($user)
            ->postJson('dashboard/users', []);

        $response
            ->assertJsonValidationErrors([
                'name',
                'email',
                'password',
                'role_id',
                'weekly_salary',
                'image'
            ]);
    }
}
