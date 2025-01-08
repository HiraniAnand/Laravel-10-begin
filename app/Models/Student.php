<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'dob', 'mobile', 'email', 'gender', 'address', 'city', 'state', 'country', 'hobbies'
    ];

    protected $casts = [
        'hobbies' => 'array'
    ];
}