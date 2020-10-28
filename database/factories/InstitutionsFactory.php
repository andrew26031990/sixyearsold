<?php

namespace Database\Factories;

use App\Models\Institutions;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstitutionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Institutions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->randomDigitNotNull,
        'region_id' => $this->faker->randomDigitNotNull,
        'district_id' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'address' => $this->faker->text,
        'code' => $this->faker->word
        ];
    }
}
