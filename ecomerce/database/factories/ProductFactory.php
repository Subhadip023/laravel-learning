<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
            'name' => $this->faker->word(),  // Generates a random name for the product
            'description' => $this->faker->sentence(),  // Generates a random description
            'category_id' => Category::factory(),  // Links to a random category
            'color' => $this->faker->colorName(),  // Random color name
            'dimention' => $this->faker->word(),  // Random dimension
            'meterial' => $this->faker->word(),  // Random material
            'price' => $this->faker->randomFloat(2, 10, 100),  // Random price between 10 and 100
            'min_order_quantity' => $this->faker->numberBetween(1, 10),  // Random quantity
            'star' => $this->faker->randomFloat(2, 1, 5),  // Random star rating between 1 and 5
            'stock' => $this->faker->numberBetween(0, 100),  // Random stock quantity
            'sku' => $this->faker->unique()->word(),  // Unique SKU
        ];
    }
}
