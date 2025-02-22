<?php

namespace App\Livewire\Admin;

use WireUi\Traits\Actions;
use App\Models\Funeral as Fune;
use Livewire\Component;

class Funeral extends Component
{
    use Actions;
    public $search = '';
    public $funerals;
    public $showModal = false;
    public $selectedFuneral = null;

    public function mount()
    {
        $this->loadFunerals();
    }

    public function updatedSearch()
    {
        $this->loadFunerals();
    }

    public function loadFunerals()
    {
        $this->funerals = Fune::where('status', '!=', 'cancel')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function viewDetails($id)
    {
        $this->selectedFuneral = Fune::find($id);
        $this->showModal = true;
    }

    public function approve($id)
    {
        $funeral = Fune::find($id);
        if ($funeral) {
            $funeral->status = 'approved';
            $funeral->save();

            $this->notification()->success(
                $title = 'Funeral Approved',
                $description = 'Funeral details approved successfully'
            );

            $this->loadFunerals();
        }
    }

    public function cancel($id)
    {
        $funeral = Fune::find($id);
        if ($funeral) {
            $funeral->status = 'cancel';
            $funeral->save();

            $this->notification()->error(
                $title = 'Funeral Canceled',
                $description = 'Funeral details canceled successfully!'
            );

            $this->loadFunerals();
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function sa()
    {
        $this->updatedSearch();
    }

    public function render()
    {
        return view('livewire.admin.funeral', [
            'funerals' => $this->funerals,
        ]);
    }
}
