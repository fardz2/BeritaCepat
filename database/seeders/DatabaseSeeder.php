<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad Faridz',
            'email' => 'faridzmuhamad679@gmail.com',
            'password' =>  bcrypt('@Admin1184'),
            'role' => 'admin'
        ]);
        $categories = [
            'Entertaiment',
            'Olahgraga',
            'Kuliner',
            'Politik',
                'Lingkungan',
                'Kemanusiaan'
        ];
        foreach ($categories as $category) {
            Category::create(['category_name' => $category, 'category_slug' => Str::slug($category, '-')]);
        }
    }
}
