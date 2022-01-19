<?php

namespace App\Models;

use App\Models\Class_;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'tel_number',
        'date_of_birth',
        'password',
        'is_admin',
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function class_()
    {
        return $this->hasOne(Class_::class);
    }

    // suskaičiuoja visus mokytojo mokynius
    public function getCountPupilsAttribute()
    {
        $lessons = Lesson::where('teacher_id', '=', $this->id)->get();
        $classIds = [];
        $pupils = 0;
        
        // surenka mokytojo klases
        foreach ($lessons as $lesson)
        {
            if (!in_array($lesson->class_id, $classIds))
            {
                array_push($classIds, $lesson->class_id);
            }
        }

        // suskaičiuoja kiek yra mokynių tose klasėse
        foreach ($classIds as $classId)
        {
            $pupils += Student::where('class__id', '=', $classId)->count();
        }
        
        return $pupils;
    }
}
