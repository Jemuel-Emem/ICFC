<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Updates; // Correct the model name to follow Laravel conventions

class Index extends Component
{
    public function render()
    {
        // Fetch all updates from the database
        $updates = Updates::latest()->get();

        // Pass the updates to the view
        return view('livewire.user.index', [
            'updates' => $updates,
        ]);
    }
}
