<?php

namespace App\Livewire\Admin;

use WireUi\Traits\Actions;
use App\Models\Funeral as Fune;
use Livewire\Component;

class Funeral extends Component
{
    use Actions;
    public $search;
    public $funerals;
    public $showModal = false;
    public $selectedFuneral = null;

    public function mount()
    {
        $this->funerals = Fune::all();
    }
    public function sa()
    {

        $this->funerals = Fune::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function viewDetails($id)
    {
        $this->selectedFuneral = Fune::find($id);
        $this->showModal = true;
    }

    public function approve($id)
    {
        $funeral = Fune::find($id);
        $funeral->status = 'approved';
        $funeral->save();

        $this->notification()->success(
            $title = 'Funeral Approved',
            $description = 'Funeral details approved successfully'
        );

        $this->mount();
    }

    public function cancel($id)
    {
        $funeral = Fune::find($id);
        $funeral->status = 'cancel';
        $funeral->save();

        $this->notification()->success(
            $title = 'Funeral Cancelled',
            $description = 'Funeral details cancelled successfully'
        );

        $this->mount();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.admin.funeral', [
            'funerals' => $this->funerals,
        ]);
    }
}
