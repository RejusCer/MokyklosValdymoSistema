<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Class_;
use App\Models\Lesson;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create('lt_LT');
        Teacher::factory()->create([
            'first_name' => 'Rejus',
            'last_name' => 'Cerniauskas',
            'email' => 'cern@gmail.com',
            'tel_number' => 86247555,
            'date_of_birth' => '1995-05-05',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);
        Teacher::factory(10)->create();
        Class_::factory(8)->state(new Sequence(
            ['id' => '12-A'],
            ['id' => '12-B'],
            ['id' => '11-A'],
            ['id' => '11-B'],
            ['id' => '10-A'],
            ['id' => '10-B'],
            ['id' => '9-A'],
            ['id' => '9-B'],
        ))->create();
        Student::factory(50)->create();
        Comment::factory(100)->create();
        Lesson::factory(25)->state(new Sequence(
            ['subject' => 'Lietuvių kalba'],
            ['subject' => 'Anglų kalba'],
            ['subject' => 'Matematika'],
            ['subject' => 'Fizika'],
            ['subject' => 'Bilogija'],
            ['subject' => 'Rusų kalba'],
            ['subject' => 'Chemija'],
            ['subject' => 'Kūno kultūra'],
        ))->create();
        Grade::factory(1000)->create();
    }
}
