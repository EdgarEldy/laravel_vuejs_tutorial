<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Load categories
        $categories = array_column(Category::all()->toArray(), 'id');
        return [
            //
            'category_id' => Arr::random($categories),
            'product_name' => $this->faker->name,
            'unit_price' => $this->faker->randomNumber(4)
        ];
    }
}
