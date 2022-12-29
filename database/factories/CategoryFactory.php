<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }


    public function configure(){
        
        return $this->afterCreating(function (Category $category){
            Product::factory(2)->categoryId($category)->create();
        });

    }
}
