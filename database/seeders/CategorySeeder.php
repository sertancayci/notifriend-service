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
    //delete existing records for table


    public function run(): void
    {

        $categories = [
            ['name' => 'Sports', 'slug' => 'sports', 'status' => 'ACTIVE', 'thumbnail' => 'sports-icon.png', 'color' => ['FF8400E7', 'C100B7']],
            ['name' => 'Movies', 'slug' => 'movies', 'status' => 'ACTIVE', 'thumbnail' => 'movies-icon.png', 'color' => ['FFE13300', 'FFE1BA00']],
            ['name' => 'Games', 'slug' => 'games', 'status' => 'ACTIVE', 'thumbnail' => 'games-icon.png', 'color' => ['FF1E3264', 'FF0B359C']],
            ['name' => 'News', 'slug' => 'news', 'status' => 'ACTIVE', 'thumbnail' => 'news-icon.png', 'color' => ['FFE8125C', 'FFE8121C']],
            ['name' => 'Music', 'slug' => 'music', 'status' => 'ACTIVE', 'thumbnail' => 'music-icon.png', 'color' => ['FF158A08', 'FF088A70']],
            ['name' => 'Streamers', 'slug' => 'streamers', 'status' => 'ACTIVE', 'thumbnail' => 'streamers-icon.png', 'color' => ['FF77BC00', 'FFAFBC00']],
            ['name' => 'Influencers', 'slug' => 'influencers', 'status' => 'ACTIVE', 'thumbnail' => 'influencers-icon.png', 'color' => ['FFE1118B', 'FFCB002C']],
            ['name' => 'Clique', 'slug' => 'clique', 'status' => 'ACTIVE', 'thumbnail' => 'clique-icon.png', 'color' => ['FF28B06A', 'FF00DC28']],
            ['name' => 'For You', 'slug' => 'foryou', 'status' => 'ACTIVE', 'thumbnail' => 'for-you-icon.png', 'color' => ['FFE8125C', 'FFE8121C']],
        ];

        // Insert the categories into the database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'status' => $category['status'],
                'thumbnail' => $category['thumbnail'],
                'color' => json_encode($category['color']),
            ]);
        }
    }
}
