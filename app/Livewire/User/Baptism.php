<?php

namespace App\Livewire\User;

use App\Models\Baptism as Bapt;
use WireUi\Traits\Actions;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Baptism extends Component
{
    use Actions;

    public $child_name, $child_gender, $child_dob, $child_place_of_birth;
    public $father_name, $mother_name, $residence, $parents_phone_number;
    public $preferred_baptism_date, $additional_information,$family_connection,$child_nationality;
    public $scheduledBaptisms = [];

    // Validation Rules
    protected $rules = [
        'child_name' => 'required|string|max:255',
        'child_gender' => 'required|in:Male,Female',
        'child_dob' => 'required|date',
        'child_place_of_birth' => 'nullable|string|max:255',
        'father_name' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'residence' => 'nullable|string|max:255',
        'parents_phone_number' => 'required|string|max:15',
        'preferred_baptism_date' => 'required|date',
        'additional_information' => 'nullable|string',
    ];

    public function submitForm()
    {
        $this->validate();

        // Check if the selected baptism date is already booked
        $existingBaptism = Bapt::where('preferred_baptism_date', $this->preferred_baptism_date)->exists();

        if ($existingBaptism) {
            $this->notification()->error(
                $title = 'Date Unavailable',
                $description = 'The selected baptism date is already booked. Please choose another date.'
            );
            return;
        }

        // Create a new baptism record
        Bapt::create([
            'user_id' => Auth::id(),
            'child_name' => $this->child_name,
            'child_gender' => $this->child_gender,
            'child_dob' => $this->child_dob,
            'child_place_of_birth' => $this->child_place_of_birth,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'residence' => $this->residence,
            'family_connection' => $this->family_connection,
            'child_nationality' => $this->child_nationality,
            'parents_phone_number' => $this->parents_phone_number,
            'preferred_baptism_date' => $this->preferred_baptism_date,
            'additional_information' => $this->additional_information,
            'status' => 'pending',
        ]);

        $this->notification()->success(
            $title = 'Baptism Data Saved',
            $description = 'Baptism registration submitted successfully!'
        );

        $this->reset();
        $this->loadScheduledBaptisms();
    }

    // Fetch approved baptisms for the calendar
    public function getApprovedSchedulesProperty()
    {
        return Bapt::where('status', 'approved')
            ->select('preferred_baptism_date as date')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->loadScheduledBaptisms();
    }

    public function loadScheduledBaptisms()
    {
        $this->scheduledBaptisms = Bapt::where('status', 'approved')
            ->select('preferred_baptism_date as start', 'child_name as title')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.user.baptism', [
            'approvedSchedules' => $this->scheduledBaptisms
        ]);
    }
}
