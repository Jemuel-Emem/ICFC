<?php

namespace App\Livewire\User;

use App\Models\Funeral as Fune;
use Livewire\Component;

class Funeral extends Component
{

    public $name;
    public $gender;
    public $religion;
    public $age;
    public $place_of_birth;
    public $date_of_death;
    public $citizenship;
    public $residence;
    public $civil_status;
    public $occupation;
    public $funeral_date;
    public $contact_person_name;
    public $additional_information;

    public function submitForm()
    {

        $validatedData = $this->validate([
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
            'funeral_date' => 'nullable|date',
            'contact_person_name' => 'nullable|string|max:255',
            'additional_information' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->id();
        Fune::create($validatedData);


        $this->reset();


        session()->flash('message', 'Funeral details have been successfully saved.');
    }

    public function render()
    {
        return view('livewire.user.funeral');
    }
}
