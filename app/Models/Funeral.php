<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funeral extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'religion',
        'age',
        'place_of_birth',
        'date_of_death',
        'citizenship',
        'residence',
        'civil_status',
        'occupation',
        'funeral_date',
        'contact_person_name',
        'additional_information',
        'time_schedule',
        'status',
        'requirements'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
