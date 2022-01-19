<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade',
        'student_id',
        'lesson_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
