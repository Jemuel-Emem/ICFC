<?php

namespace App\Livewire\User;

use App\Models\Baptism;
use App\Models\Wedding;
use App\Models\Funeral;
use Livewire\Component;
use Illuminate\Support\Collection;

class AppointmentStatus extends Component
{
    public $userId;

    public function render()
    {
        $userId = auth()->id();

        // Ensure collections are properly initialized
        $baptisms = Baptism::where('user_id', $userId)->get();
        $weddings = Wedding::where('user_id', $userId)->get();
        $funerals = Funeral::where('user_id', $userId)->get();

        // Add 'type' attribute to each item
        $baptisms = $baptisms->map(function ($baptism) {
            $baptism->type = 'Baptism';
            return $baptism;
        });

        $weddings = $weddings->map(function ($wedding) {
            $wedding->type = 'Wedding';
            return $wedding;
        });

        $funerals = $funerals->map(function ($funeral) {
            $funeral->type = 'Funeral';
            return $funeral;
        });

        // Merge all collections correctly
        $appointments = new Collection();
        $appointments = $appointments->concat($baptisms)
                                     ->concat($weddings)
                                     ->concat($funerals);

        return view('livewire.user.appointment-status', compact('appointments'));
    }
}
