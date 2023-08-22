<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_name', 
        'guest_pax',
        'guest_group', 
        'check_in',
        'check_out', 
        'created_by',
    ];
}
