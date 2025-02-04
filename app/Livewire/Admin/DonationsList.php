<?php

namespace App\Livewire\Admin;

use App\Models\Donations as Donation;
use Livewire\Component;
use Livewire\WithPagination;

class DonationsList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.donations-list', [
            'donations' => Donation::paginate(10)
        ]);
    }
}
