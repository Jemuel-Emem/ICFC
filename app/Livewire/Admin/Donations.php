<?php

namespace App\Livewire\Admin;
use WireUi\Traits\Actions;
use App\Models\Donations as Donation;
use Livewire\Component;

class Donations extends Component
{
    use Actions;
    public $date, $donor, $services = 0, $cash = 0, $total = 0, $change = 0;

    public function updated($propertyName)
    {

        $this->services = is_numeric($this->services) ? (float) $this->services : 0;
        $this->cash = is_numeric($this->cash) ? (float) $this->cash : 0;


        $this->total = $this->services;


        $this->change = max($this->cash - $this->total, 0);
    }

    public function save()
    {

        $this->validate([
            'date' => 'required|date',
            'donor' => 'required|string|max:255',
            'services' => 'required|numeric',
            'cash' => 'required|numeric',
        ]);


        Donation::create([
            'donor_name' => $this->donor,
            'amount' => $this->total,
            'donation_date' => $this->date,
        ]);


        $this->reset();
        $this->notification()->success(
            $title = 'Baptism Approved',
            $description = 'Donation saved successfully!'
        );


    }

    public function render()
    {
        return view('livewire.admin.donations');
    }
}
