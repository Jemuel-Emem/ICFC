<?php

namespace App\Livewire\User;

use App\Models\Baptism;
use App\Models\Wedding;
use App\Models\Funeral;
use Livewire\Component;

class AppointmentStatus extends Component
{
    public $userId;

    public function render()
    {

        $userId = auth()->id();


        $baptisms = Baptism::where('user_id', $userId)->get()->map(function ($baptism) {
            $baptism->type = 'Baptism';
            return $baptism;
        });

        $weddings = Wedding::where('user_id', $userId)->get()->map(function ($wedding) {
            $wedding->type = 'Wedding';
            return $wedding;
        });

        $funerals = Funeral::where('user_id', $userId)->get()->map(function ($funeral) {
            $funeral->type = 'Funeral';
            return $funeral;
        });


        $appointments = $baptisms->merge($weddings)->merge($funerals);


        return view('livewire.user.appointment-status', compact('appointments'));
    }
}
