<?php

namespace Database\Factories;

use App\Models\Pupils;
use Illuminate\Database\Eloquent\Factories\Factory;

class PupilsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pupils::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id' => $this->faker->randomDigitNotNull,
        'full_name' => $this->faker->word,
        'birthday' => $this->faker->word,
        'birth_certificate_number' => $this->faker->word,
        'birth_certificate_date' => $this->faker->word,
        'birth_certificate_file' => $this->faker->word,
        'has_certificate' => $this->faker->word
        ];
    }
}
