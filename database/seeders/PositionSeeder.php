<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run()
    {
        Category::all()->each(function ($category) {
            Position::factory()->count(3)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
