<?php
namespace App\Livewire\Admin;
use WireUi\Traits\Actions;
use App\Models\Baptism as bapp;
use Livewire\Component;

class Baptism extends Component
{
    use Actions;
    public $baptisms;
    public $showModal = false;
    public $selectedBaptism = null;

    public function mount()
    {
        $this->baptisms = bapp::all();
    }

    public function viewDetails($id)
    {
        $this->selectedBaptism = bapp::find($id);
        $this->showModal = true;
    }

    public function approve($id)
    {
        $baptism = bapp::find($id);
        $baptism->status = 'approved';
        $baptism->save();
        $this->notification()->success(
            $title = 'Baptism Approved',
            $description = 'Baptism approved successfully'
        );

        $this->mount();
    }

    public function cancel($id)
    {
        $baptism = bapp::find($id);
        $baptism->status = 'cancel';
        $baptism->save();
        $this->notification()->success(
            $title = 'Baptism Cancel',
            $description = 'Baptism cancelled successfully'
        );

        $this->mount();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin.baptism');
    }
}
