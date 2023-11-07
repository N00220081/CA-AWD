<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
//not mass assignable
    protected $guarded = [
        'name',
        'number'
    ];

   //mass assignable
    protected $fillable = [
        'name',
        'dob',
        'number',
        'address',
        'college_id'
    ];
}
