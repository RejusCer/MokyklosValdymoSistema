<?php

namespace Database\Factories;

use App\Models\Class_;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classes = Class_::all();

        return [
            'subject' => 'Lietuvių kalba',
            'class_id' => $classes[rand(0, count($classes) - 1)],
            'teacher_id' => rand(1, 11)
        ];
    }
}
