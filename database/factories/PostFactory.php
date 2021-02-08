<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'id' => $this->faker->uuid,
            'title' => $this->faker->catchPhrase,
            'ihave' => $this->faker->text,
            'ineed' => $this->faker->text,
            'contact' => $this->faker->phoneNumber,
        ];
    }
}
