<?php

namespace App\Livewire\User;

use App\Models\Baptism;
use App\Models\Wedding;
use Livewire\Component;

class AppointmentStatus extends Component
{
    public $userId;

    public function render()
    {
        // Assuming the user is logged in and you can fetch their appointments
        $userId = auth()->id();  // or pass it directly when calling the component

        // Fetch baptism appointments for the user
        $baptisms = Baptism::where('user_id', $userId)->get()->map(function ($baptism) {
            $baptism->type = 'Baptism';
            return $baptism;
        });

        // Fetch wedding appointments for the user
        $weddings = Wedding::where('user_id', $userId)->get()->map(function ($wedding) {
            $wedding->type = 'Wedding';
            return $wedding;
        });

        // Merge both baptism and wedding records into one collection
        $appointments = $baptisms->merge($weddings);

        return view('livewire.user.appointment-status', compact('appointments'));
    }
}
