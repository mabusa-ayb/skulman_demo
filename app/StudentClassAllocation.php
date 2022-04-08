<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClassAllocation extends Model
{
    protected $table = 'student_class_allocations';
    protected $fillable = ['school_class_id', 'year', 'user_id', 'created_by'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function school_class(){
        return $this->belongsTo('App\schoolClass');
    }
}
