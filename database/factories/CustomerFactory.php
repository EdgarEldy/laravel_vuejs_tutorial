<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Add fake customer's data
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
        ];
    }
}
