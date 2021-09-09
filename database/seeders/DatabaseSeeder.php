<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();

        User::factory(10)->create()->each(function ($user) {
            Post::factory(2)->create([
                'user_id' => $user->id,
                'category_id' => rand(1, 5)
            ]);
        });
    }
}
