<?php

namespace fms;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'p_no',
        'email',
        'designation',
        'access_level',
        'phone_no',
        'nat_id'
    ];
}
