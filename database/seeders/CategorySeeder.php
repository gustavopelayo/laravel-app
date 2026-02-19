<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Book reviews',
            'Travel',
            'My CV',
            'Tech notes',
            'Life updates',
            'music',
            'film-tv'
        ];

        foreach ($categories as $name) {
            Category::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
            ]);
        }
    }
}

