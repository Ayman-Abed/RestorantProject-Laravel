<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'phone', 'email', 'date_and_time','massage','status'
    ];
}
