<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamMarks extends Model
{
    protected $table = 'exam_marks';
    protected $fillable = ['student_id', 'teacher_id', 'term', 'year', 'subject_id', 'mark', 'created_by'];
}
