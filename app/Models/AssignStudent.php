<?php

namespace App\Models;

use App\Models\DiscountStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignStudent extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function student_class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
    public function student_year()
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }
    public function discount()
    {
        return $this->belongsTo(DiscountStudent::class, 'id', 'assing_student_id');
    }
    public function shift()
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }
    public function group()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }
}
