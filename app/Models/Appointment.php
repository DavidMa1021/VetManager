<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    static $rules = [
        'pet_id' => 'required',
        'start_date' => 'required',
        'start_time' => 'required',
        'end_date' => 'required',
        'end_time' => 'required'

    ];

    protected $fillable = [
        'pet_id',
        'start_date',
        'start_time',
        'end_date',
        'end_time'
    ];

}
