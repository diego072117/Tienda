<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function categoryId($category)
    {
        return $this->state([
            'category_id' => $category->id,
        ]);
    }

    public function definition()
    {
        
        return [
            'category_id' => $this->faker->randomElement([1,2,3]),
            'name' => $this->faker->name(),
            'stock' => $this->faker->randomDigit(),
            'precio' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'description' => $this->faker->paragraph(),
        ];
    }
}
