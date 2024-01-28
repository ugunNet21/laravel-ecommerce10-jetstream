<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CategoriesProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories_product')->insert([
                'name' => $faker->word,
                'slug' => $faker->slug,
                'status' => $faker->randomElement(['active', 'inactive']),
                'parent_id' => null,
                'images' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
