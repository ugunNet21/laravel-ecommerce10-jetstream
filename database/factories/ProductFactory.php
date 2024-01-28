<?php

namespace Database\Factories;

use App\Models\Backend\Product\CategoryProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->word),
            'category_id' => CategoryProduct::factory(),
            'subcategory_id' => null, // adjust if you want to create products with subcategory
            'brand_id' => null, // adjust if you want to create products with brand
            'product_code' => $this->faker->unique()->ean8,
            'discount' => $this->faker->randomFloat(2, 0, 50),
            'tax' => $this->faker->randomFloat(2, 0, 20),
            'favorite' => $this->faker->boolean,
            'short_description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph,
            'selling_price' => $this->faker->randomFloat(2, 10, 200),
            'purchase_price' => $this->faker->randomFloat(2, 5, 150),
            'stock' => $this->faker->numberBetween(0, 100),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
