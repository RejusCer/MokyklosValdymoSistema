<?php

namespace Database\Factories;

use App\Models\Class_;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class Class_Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Class_::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '12-A',
            'teacher_id' => rand(2, 11)
        ];
    }
}
