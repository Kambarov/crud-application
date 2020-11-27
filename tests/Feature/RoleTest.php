<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;
    /*
     * The list of roles
     */
    public function testGetRoleList()
    {
        Artisan::call('migrate:fresh --seed');
        $user = User::first();

        $response = $this->actingAs($user)
            ->getJson('dashboard/roles');

        $response
            ->assertViewHas([
                'roles' => Role::oldest('id')
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
        $user = User::first();

        $response = $this->actingAs($user)
            ->followingRedirects()
            ->post(route('dashboard.roles.store'), [
                'name' => [
                    'ru' => 'test ru',
                    'en' => 'test en'
                ],
                'permissions' => [
                    'users' => [
                        'create' => true
                    ]
                ]
            ]);

        $response
            ->assertOk();
    }

    public function testValidationFails()
    {
        Artisan::call('migrate:fresh --seed');
        $user = User::first();

        $response = $this->actingAs($user)
            ->postJson('dashboard/roles', []);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'permissions',
                'name'
        ]);
    }
}
