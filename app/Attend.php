<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    //
    protected $fillable =
        [
            'student_name',
            'class_title',
            'class_description',
            'student_email',
            'course_name',
            'lecturer_name',
            'attendance_date',
            'is_approved',
            'approved_by',
            'approved_date',
            'photo_one',
            'photo_two',
            'photo_three',
            'photo_four'
        ];



}
