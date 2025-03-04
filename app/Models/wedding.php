<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wedding extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'status', 'groom_name', 'groom_birthdate', 'groom_place_of_birth', 'groom_age',
        'groom_residence', 'groom_religion', 'groom_civil_status', 'groom_phone_number',
        'groom_fathers_name', 'groom_citizenship', 'groom_advisor_name', 'groom_relationship_to_advisor',
        'bride_name', 'bride_birthdate', 'bride_place_of_birth', 'bride_age', 'bride_residence',
        'bride_religion', 'bride_civil_status', 'bride_phone_number', 'bride_fathers_name',
        'bride_citizenship', 'bride_advisor_name', 'bride_relationship_to_advisor',
        'wedding_date', 'special_requests','time_schedule','requirements'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
