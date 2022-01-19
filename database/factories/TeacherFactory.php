<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'tel_number' => $this->faker->numerify('#########'),
            'date_of_birth' => $this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-22 years', $timezone = null),
            'password' => Hash::make('123'),
            'is_admin' => false
        ];
    }
}
