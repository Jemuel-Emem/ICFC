<?php

namespace App\Livewire\Admin;

use App\Models\Wedding;
use WireUi\Traits\Actions;
use Livewire\Component;

class Weddings extends Component
{
    public $selectedWedding = null;
    public $showModal = false;
    use Actions;
    public $weddings;
    public $search = '';

    public function mount()
    {
        $this->weddings = Wedding::all();
    }

    public function updatedSearch()
    {
        $this->weddings = Wedding::where('bride_name', 'like', '%' . $this->search . '%')
            ->orWhere('groom_name', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function viewDetails($id)
    {
        $this->selectedWedding = Wedding::findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedWedding = null;
    }

    public function approve($id)
    {
        $wedding = Wedding::findOrFail($id);
        $wedding->status = 'approved';
        $wedding->save();
        $this->notification()->success(
            $title = 'Wedding Approved',
            $description = 'Wedding approved successfully'
        );

        $this->weddings = Wedding::all();
    }

    public function sa(){
$this->updatedSearch();
    }
    public function cancel($id)
    {
        $wedding = Wedding::findOrFail($id);
        $wedding->status = 'canceled';
        $wedding->save();

        $this->notification()->error(
            $title = 'Wedding Cancelled',
            $description = 'Wedding canceled successfully!'
        );
        $this->weddings = Wedding::all();
    }

    public function render()
    {
        return view('livewire.admin.weddings', [
            'weddings' => $this->weddings,
        ]);
    }
}
