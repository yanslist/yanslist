<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostType;
use App\Repositories\RegionRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        // yangon, mandalay
        $region_id = $this->faker->randomElement([13, 10]);
        $regionRepo = app(RegionRepository::class);
        $region = $regionRepo->with('townships')->find($region_id);
        $township_ids = Arr::pluck($region->townships, 'id');
        return [
            'id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(PostType::values()),
            'is_offer' => $this->faker->boolean,
            'title' => $this->faker->catchPhrase,
            'body' => $this->faker->text,
            'region_id' => $region_id,
            'township_id' => $this->faker->randomElement($township_ids),
            'user_id' => 1,
            'email' => $this->faker->email,
        ];
    }

}
