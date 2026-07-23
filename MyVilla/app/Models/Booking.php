<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'check_in',
        'check_out',
        'adults',
        'children',
        'total_price',
        'status',
    ];
}
