<?php

namespace App\Livewire\User;
use App\Models\baptism as bapp;
use WireUi\Traits\Actions;
use Livewire\Component;

class Baptism extends Component
{
    use Actions;
    public $child_name, $child_dob, $child_gender, $child_place_of_birth;
    public $family_connection, $child_nationality, $mother_name, $father_name;
    public $residence, $parents_phone_number, $preferred_baptism_date;

    // Validation rules
    protected $rules = [
        'child_name' => 'required|string|max:255',
        'child_dob' => 'required|date',
        'child_gender' => 'required|in:Male,Female',
        'child_place_of_birth' => 'required|string|max:255',
        'family_connection' => 'required|string|max:255',
        'child_nationality' => 'required|string|max:255',
        'mother_name' => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'residence' => 'required|string|max:255',
        'parents_phone_number' => 'required|regex:/^\+?[0-9]{7,15}$/',
        'preferred_baptism_date' => 'required|date',
    ];


    public function submitForm()
    {

        $this->validate();
        bapp::create([
            'user_id' => auth()->user()->id,
            'child_name' => $this->child_name,
            'child_dob' => $this->child_dob,
            'child_gender' => $this->child_gender,
            'child_place_of_birth' => $this->child_place_of_birth,
            'family_connection' => $this->family_connection,
            'child_nationality' => $this->child_nationality,
            'mother_name' => $this->mother_name,
            'father_name' => $this->father_name,
            'residence' => $this->residence,
            'parents_phone_number' => $this->parents_phone_number,
            'preferred_baptism_date' => $this->preferred_baptism_date,
            'status' => 'pending',
        ]);

        $this->notification()->success(
            $title = 'Baptism Data saved',
            $description = 'Baptism registration submitted successfully!'
        );

        $this->reset();
    }

    public function render()
    {
        return view('livewire.user.baptism');
    }
}
