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
    public $approvedSchedules = [];

    public function mount()
    {
        $currentYear = Carbon::now()->year;

        // Count total events for this year
        $this->totalWeddings = Wedding::whereYear('wedding_date', $currentYear)->count();
        $this->totalBaptisms = Baptism::whereYear('preferred_baptism_date', $currentYear)->count();
        $this->totalFunerals = Funeral::whereYear('funeral_date', $currentYear)->count();

        // Fetch all approved events with proper date formatting
        $weddings = Wedding::where('status', 'approved')
            ->get()
            ->map(fn($w) => [
                'date' => Carbon::parse($w->wedding_date)->format('Y-m-d'),
                'title' => "Wedding: " . $w->groom_name,
                'type' => "wedding"
            ])
            ->toArray();

        $baptisms = Baptism::where('status', 'approved')
            ->get()
            ->map(fn($b) => [
                'date' => Carbon::parse($b->preferred_baptism_date)->format('Y-m-d'),
                'title' => "Baptism: " . $b->child_name,
                'type' => "baptism"
            ])
            ->toArray();

        $funerals = Funeral::where('status', 'approved')
            ->get()
            ->map(fn($f) => [
                'date' => Carbon::parse($f->funeral_date)->format('Y-m-d'),
                'title' => "Funeral: " . $f->name,
                'type' => "funeral"
            ])
            ->toArray();

        // Merge all events into one array
        $this->approvedSchedules = array_merge($weddings, $baptisms, $funerals);
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'approvedSchedules' => $this->approvedSchedules
        ]);
    }
}
