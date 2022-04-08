<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveSession extends Model
{
    protected $table = 'active_registration_session';
    protected $fillable = ['year', 'created_by'];
}
