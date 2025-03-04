<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Certificate extends Component
{
    public $dateOfBaptism, $nameOfChild, $dateOfBirth, $placeOfBirth, $legitimacy;
    public $nameOfFather, $nameOfMother, $residence, $paternalGrandparents, $maternalGrandparents;
    public $sponsors, $officiatingPriest;

    public function render()
    {
        return view('livewire.admin.certificate');
    }
}
