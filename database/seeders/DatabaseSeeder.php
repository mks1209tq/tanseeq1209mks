<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Position;
use App\Models\OrgUnit;
use App\Models\User;
use App\Models\Asset;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        //UserSeeder::class,
        Category::factory(10)->create();
        Position::factory(10)->create();
        OrgUnit::factory(10)->create();
        Asset::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
