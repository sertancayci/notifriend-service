<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Sports', 'slug' => 'sports', 'status' => "ACTIVE"],
            ['name' => 'Movies', 'slug' => 'movies', 'status' =>"ACTIVE"],
            ['name' => 'Games', 'slug' => 'games', 'status' => "ACTIVE"],
            ['name' => 'News', 'slug' => 'news', 'status' => "ACTIVE"],
            ['name' => 'Music', 'slug' => 'music', 'status' => "ACTIVE"],
            ['name' => 'Streamers', 'slug' => 'streamers', 'status' => "ACTIVE"],
            ['name' => 'Influencers', 'slug' => 'influencers', 'status' => "ACTIVE"],
            ['name' => 'Clique', 'slug' => 'clique', 'status' => "ACTIVE"],
            ['name' => 'For You', 'slug' => 'foryou', 'status' => "ACTIVE"],
        ];

        // Insert the categories into the database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'status' => $category['status'],
            ]);
        }
    }
}
