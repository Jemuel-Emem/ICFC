<?php
namespace App\Livewire\Admin;

use WireUi\Traits\Actions;
use App\Models\Baptism as bapp;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Baptism extends Component
{
    use Actions;
    public $baptisms;
    public $showModal = false;
    public $selectedBaptism = null;
    public $search = '';

    public function mount()
    {
        $this->loadBaptisms();
    }

    public function updatedSearch()
    {
        $this->loadBaptisms();
    }

    public function loadBaptisms()
    {
        $this->baptisms = bapp::where('status', '!=', 'cancel')
            ->where(function ($query) {
                $query->where('child_name', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function viewDetails($id)
    {
        $this->selectedBaptism = bapp::with('user')->find($id);
        $this->showModal = true;
    }


    public function approve($id)
    {
        $baptism = bapp::find($id);
        if ($baptism) {
            $baptism->status = 'approved';
            $baptism->save();

            $this->sendEmailNotification($baptism->user->email, 'APPROVED');
            $this->notification()->success(
                $title = 'Baptism Approved',
                $description = 'Baptism approved successfully'
            );

            $this->loadBaptisms();
        }
    }

    private function sendEmailNotification($email, $status)
    {
        if (!$email) {
            return;
        }

        $subject = "Baptism Status Update - ICFC";
        $message = "
            <p>Dear User,</p>
            <p>Your baptism request has been <strong>{$status}</strong>.</p>
            <p>Thank you,<br>ICFC</p>
        ";

        Mail::send([], [], function ($mail) use ($email, $subject, $message) {
            $mail->to($email)
                ->subject($subject)
                ->html($message);
        });
    }
    public function cancel($id)
    {
        $baptism = bapp::find($id);
        if ($baptism) {
            $baptism->status = 'cancel';
            $baptism->save();
            $this->sendEmailNotification($baptism->user->email, 'CANCELLED');
            $this->notification()->error(
                $title = 'Baptism Canceled',
                $description = 'Baptism canceled successfully!'
            );

            $this->loadBaptisms();
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
        return view('livewire.admin.baptism', [
            'baptisms' => $this->baptisms,
        ]);
    }
}
