<?php

namespace App\Livewire\Admin;

use App\Models\Baptism;
use App\Models\Funeral;
use App\Models\Wedding;
use Livewire\Component;
use Carbon\Carbon;

class Index extends Component
{
    public $totalWeddings;
    public $totalBaptisms;
    public $totalFunerals;

    public function mount()
    {
        $currentYear = Carbon::now()->year;


        $this->totalWeddings = Wedding::whereYear('wedding_date', $currentYear)->count();
        $this->totalBaptisms = Baptism::whereYear('preferred_baptism_date', $currentYear)->count();
        $this->totalFunerals = Funeral::whereYear('funeral_date', $currentYear)->count();
    }

    public function render()
    {
        return view('livewire.admin.index');
    }
}
