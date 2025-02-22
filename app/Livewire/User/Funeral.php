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
    public $approvedSchedules = [];

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


        if (Fune::where('funeral_date', $this->funeral_date)->exists()) {
            $this->notification()->error(
                'Date Unavailable',
                'The selected funeral date is already booked. Please choose another date.'
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
            'Funeral Data Saved',
            'Funeral registration submitted successfully!'
        );

        $this->reset();
        return redirect()->route('user-dashboard');
    }

    public function mount()
    {
        $this->loadApprovedSchedules();
    }

    public function loadApprovedSchedules()
    {
        $this->approvedSchedules = Fune::where('status', 'approved')
            ->pluck('funeral_date')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.user.funeral');
    }
}
