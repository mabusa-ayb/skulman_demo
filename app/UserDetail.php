<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['user_id', 'fname', 'sname', 'oname', 'dob', 'gender', 'title', 'staff_number', 'phone_number',
        'address', 'specialization', 'position', 'qualification', 'national_id_number', 'birth_entry_number',
        'next_of_kin', 'next_of_kin_relationship', 'next_of_kin_address', 'next_of_kin_phone_number'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function student_number(){
        return $this->hasOne('App\StudentIdentifier', 'student_id', 'user_id');
    }

}
