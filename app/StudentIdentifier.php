<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentIdentifier extends Model
{
    protected $table = 'student_identifiers';
    protected $fillable = ['student_id', 'student_number', 'created_by'];

    public function user_details(){
        return $this->belongsTo('App\UserDetail', 'user_id', 'student_id');
    }
}
