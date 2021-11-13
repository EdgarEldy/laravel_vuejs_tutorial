<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customers= array_column(Customer::all()->toArray(), 'id');
        $products= array_column(Product::all()->toArray(), 'id');

        return [
            //
            'customer_id' => Arr::random($customers),
            'product_id' => Arr::random($products),
            'qty' => $this->faker->randomNumber(2),
            'total' => $this->faker->randomNumber(4)
        ];
    }
}
