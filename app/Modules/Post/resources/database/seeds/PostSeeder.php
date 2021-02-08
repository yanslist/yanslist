<?php

namespace App\Modules\Post\Seeds;

use App\Modules\Post\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(10)->create();
    }
}
