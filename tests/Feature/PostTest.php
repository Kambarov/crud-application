<?php

namespace Tests\Feature;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /*
     * The list of posts
     */
    public function testGetPostList()
    {
        Artisan::call('migrate:fresh --seed');
        $user = User::find(1);
        Image::factory()
            ->times(5)
            ->for(
                Post::factory(), 'imageable'
            )
            ->create();

        $response = $this->actingAs($user)
            ->get(route('dashboard.posts.index'));

        $response
            ->assertViewHas([
                'posts' => Post::with('image', 'author')
                    ->latest('id')
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
            ->post(route('dashboard.posts.store'), [
                'name' => [
                    'ru' => 'test ru',
                    'en' => 'test en'
                ],
                'description' => [
                    'ru' => 'test ru',
                    'en' => 'test en'
                ],
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
            ->postJson(route('dashboard.posts.store'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'name',
                'description',
                'image'
            ]);
    }
}
