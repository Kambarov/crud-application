<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => [
                'ru' => $this->faker->name,
                'en' => $this->faker->name
            ],
            'slug' => Str::slug($this->faker->name),
            'description' => [
                'ru' => $this->faker->text,
                'en' => $this->faker->text
            ],
            'author_id' => rand(1, 3)
        ];
    }
}
