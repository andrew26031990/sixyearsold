<?php

namespace Database\Factories;

use App\Models\Districts;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Districts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'region_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word
        ];
    }
}
