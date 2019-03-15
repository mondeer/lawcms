<?php

namespace fms;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = [
        'matter_name',
        'matter_type',
        'counsel_incharge',
        'opposing_counsel',
        'file_date',
        'client_name',
        'client_email',
        'client_mobile',
        'matter_status',
        'created_by',
        'student_incharge',
        'clerk_incharge'
    ];
}
