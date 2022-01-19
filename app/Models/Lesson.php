<?php

namespace App\Models;

use App\Models\Class_;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'subject',
        'class_id',
        'teacher_id'
    ];

    public function teacher()
    {   
        return $this->belongsTo(Teacher::class);
    }

    public function class()
    {   
        return $this->belongsTo(Class_::class);
    }

    // public function student()
    // {
    //     return $this->hasMany(Student::class);
    // }
}
