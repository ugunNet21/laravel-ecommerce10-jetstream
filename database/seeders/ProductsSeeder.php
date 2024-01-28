<?php

namespace Database\Seeders;

use App\Models\Backend\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => $faker->words(2, true),
                'slug' => $faker->slug,
                'category_id' => $i, // Assuming category ids are sequential from 1 to 10
                'subcategory_id' => null,
                'brand_id' => null,
                'product_code' => "P00$i",
                'discount' => $faker->randomFloat(2, 0, 10),
                'tax' => $faker->randomFloat(2, 0, 5),
                'favorite' => $faker->boolean,
                'short_description' => $faker->sentence,
                'long_description' => $faker->paragraph,
                'selling_price' => $faker->randomFloat(2, 20, 100),
                'purchase_price' => $faker->randomFloat(2, 10, 50),
                'stock' => $faker->numberBetween(50, 200),
                'image' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
