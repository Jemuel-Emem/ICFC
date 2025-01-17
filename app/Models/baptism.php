<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baptism extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'child_name',
        'child_dob',
        'child_gender',
        'child_place_of_birth',
        'family_connection',
        'child_nationality',
        'mother_name',
        'father_name',
        'residence',
        'parents_phone_number',
        'preferred_baptism_date',
        'status',
    ];
}
