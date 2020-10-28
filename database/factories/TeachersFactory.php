<?php

namespace Database\Factories;

use App\Models\Teachers;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeachersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teachers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->word,
        'birthday' => $this->faker->word,
        'education_degree_id' => $this->faker->randomDigitNotNull,
        'specialization' => $this->faker->word,
        'education_document_name' => $this->faker->word,
        'education_document_file' => $this->faker->word,
        'education_document_number' => $this->faker->word,
        'education_document_date' => $this->faker->word,
        'district_id' => $this->faker->randomDigitNotNull,
        'region_id' => $this->faker->randomDigitNotNull,
        'institution_id' => $this->faker->randomDigitNotNull
        ];
    }
}
