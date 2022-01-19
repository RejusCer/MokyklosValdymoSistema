<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Class_ extends Model
{
    use HasFactory;

    public $timestamps = false;
    // incrementing nustatytas false nes id yra string
    public $incrementing = false;

    protected $fillable = [
        'id',
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        //dd($this->hasMany(Student::class));
        return $this->hasMany(Student::class);
    }
}
