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
        $this->loadWeddings();
    }

    public function updatedSearch()
    {
        $this->loadWeddings();
    }

    public function loadWeddings()
    {
        $this->weddings = Wedding::where('status', '!=', 'canceled')
            ->where(function ($query) {
                $query->where('bride_name', 'like', '%' . $this->search . '%')
                    ->orWhere('groom_name', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function viewDetails($id)
    {
        $this->selectedWedding = Wedding::with('user')->findOrFail($id);
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


        if ($wedding->bride_age < 18 && $wedding->groom_age < 18) {
            $this->notification()->error(
                $title = 'Approval Denied',
                $description = 'Both the bride and groom must be at least 18 years old.'
            );
            return;
        }

        $wedding = Wedding::findOrFail($id);
        $wedding->status = 'approved';
        $wedding->save();

        $this->notification()->success(
            $title = 'Wedding Approved',
            $description = 'Wedding approved successfully'
        );

        $this->loadWeddings();
    }

    public function sa()
    {
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

        $this->loadWeddings();
    }

    public function render()
    {
        return view('livewire.admin.weddings', [
            'weddings' => $this->weddings,
        ]);
    }
}
