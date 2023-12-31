<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Post::class;
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title'=>fake()->sentence(),
            'post_image'=>fake()->imageUrl('900', '300'),
            'body'=>fake()->paragraph()
            //
        ];
    }
}
