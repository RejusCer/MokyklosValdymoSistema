<?php

namespace Database\Factories;

use App\Models\Class_;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classes_ids = [];
        foreach (Class_::get('id') as $class)
        {
            array_push($classes_ids, $class->id);
        }

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'tel_number' => $this->faker->numerify('#########'),
            'date_of_birth' => $this->faker->dateTimeBetween($startDate = '-25 years', $endDate = '-13 years', $timezone = null),
            'password' => Hash::make('123'),
            'class__id' => $classes_ids[ rand(0, count($classes_ids) - 1 ) ]
        ];
    }
}
