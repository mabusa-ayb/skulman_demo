<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationStatus extends Model
{
    protected $table = 'registration_statuses';
    protected $fillable = ['year','term', 'user_id', 'status', 'create_by'];
}
