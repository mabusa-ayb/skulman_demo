<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'school_classes';
    protected $fillable = ['class_name', 'created_by', 'active'];

    public function allocation(){
        return $this->hasOne('App\TeacherClassAllocation');
    }

}
