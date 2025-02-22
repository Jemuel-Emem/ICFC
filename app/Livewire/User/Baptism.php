<?php

namespace App\Livewire\User;

use App\Models\Funeral as Fune;
use WireUi\Traits\Actions;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Funeral extends Component
{
    use Actions;

    public $name, $gender, $religion, $age, $place_of_birth, $date_of_death;
    public $citizenship, $residence, $civil_status, $occupation, $funeral_date;
    public $contact_person_name, $additional_information;
    public $scheduledFunerals = [];

    // Validation Rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'religion' => 'nullable|string|max:255',
        'age' => 'nullable|integer|min:0',
        'place_of_birth' => 'nullable|string|max:255',
        'date_of_death' => 'required|date',
        'citizenship' => 'nullable|string|max:255',
        'residence' => 'nullable|string|max:255',
        'civil_status' => 'nullable|string|max:255',
        'occupation' => 'nullable|string|max:255',
        'funeral_date' => 'required|date',
        'contact_person_name' => 'nullable|string|max:255',
        'additional_information' => 'nullable|string',
    ];

    public function submitForm()
    {
        $this->validate();

        // Check if the selected funeral date is already booked
        $existingFuneral = Fune::where('funeral_date', $this->funeral_date)->exists();

        if ($existingFuneral) {
            $this->notification()->error(
                $title = 'Date Unavailable',
                $description = 'The selected funeral date is already booked. Please choose another date.'
            );
            return;
        }

        Fune::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'age' => $this->age,
            'place_of_birth' => $this->place_of_birth,
            'date_of_death' => $this->date_of_death,
            'citizenship' => $this->citizenship,
            'residence' => $this->residence,
            'civil_status' => $this->civil_status,
            'occupation' => $this->occupation,
            'funeral_date' => $this->funeral_date,
            'contact_person_name' => $this->contact_person_name,
            'additional_information' => $this->additional_information,
            'status' => 'pending',
        ]);

        $this->notification()->success(
            $title = 'Funeral Data Saved',
            $description = 'Funeral registration submitted successfully!'
        );

        $this->reset();
        $this->loadScheduledFunerals(); // Refresh the funeral schedule list
    }

    // Fetch scheduled funerals for the calendar
    public function getApprovedSchedulesProperty()
    {
        return Fune::where('status', 'approved')
            ->select('funeral_date as date')
            ->get()
            ->toArray();
    }

    public function mount()
    {
        $this->loadScheduledFunerals();
    }

    public function loadScheduledFunerals()
    {
        $this->scheduledFunerals = Fune::where('status', 'approved')
            ->select('funeral_date as start', 'name as title')
            ->get()
            ->toArray();
    }

    public function render()
    {
        $approvedSchedules = Fune::where('status', 'approved')
            ->select('funeral_date as date')
            ->get()
            ->toArray();

        return view('livewire.user.funeral', [
            'approvedSchedules' => $approvedSchedules
        ]);
    }
}
