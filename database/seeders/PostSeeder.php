<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $faker = Faker::create();

        foreach (range(1, 10000) as $index) {
            Post::create([
                'title' => $faker->sentence(6),
                'content' => $faker->paragraph,
                'user_id' => $user->id,
            ]);
        }
    }
}
