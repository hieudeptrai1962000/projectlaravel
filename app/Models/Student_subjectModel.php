<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_subjectModel extends Model
{
    use HasFactory;

    protected $table = 'student_subject';
    protected $fillable = ['student_id', 'subject_id', 'mark'];
}
