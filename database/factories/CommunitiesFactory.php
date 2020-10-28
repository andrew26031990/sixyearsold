<?php

namespace Database\Factories;

use App\Models\Communities;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunitiesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Communities::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word
        ];
    }
}
