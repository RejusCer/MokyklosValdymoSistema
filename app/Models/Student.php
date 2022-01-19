<?php

namespace App\Models;

use App\Models\Class_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
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
        'class__id',
    ];

    public function class_()
    {
        return $this->belongsTo(Class_::class);
    }
}
