<?php

namespace App\Livewire\User;
use Illuminate\Support\Facades\Auth;
use App\Models\wedding as wed;
use WireUi\Traits\Actions;
use Livewire\Component;

class Wedding extends Component
{
    use Actions;
    public $groom_name, $groom_birthdate, $groom_place_of_birth, $groom_age, $groom_residence, $groom_religion;
    public $groom_civil_status, $groom_phone_number, $groom_fathers_name, $groom_citizenship, $groom_advisor_name, $groom_relationship_to_advisor;

    // Bride's Details
    public $bride_name, $bride_birthdate, $bride_place_of_birth, $bride_age, $bride_residence, $bride_religion;
    public $bride_civil_status, $bride_phone_number, $bride_fathers_name, $bride_citizenship, $bride_advisor_name, $bride_relationship_to_advisor;

    // Wedding Details
    public $wedding_date, $special_requests;

    public function submitForm()
    {

        $this->validate([

            'groom_name' => 'required|string|max:255',
            'groom_birthdate' => 'required|date',
            'groom_place_of_birth' => 'required|string|max:255',
            'groom_age' => 'required|integer|min:18',
            'groom_residence' => 'required|string|max:255',
            'groom_religion' => 'required|string|max:255',
            'groom_civil_status' => 'required|string|max:255',
            'groom_phone_number' => 'required|string|max:20',
            'groom_fathers_name' => 'required|string|max:255',
            'groom_citizenship' => 'required|string|max:255',
            'groom_advisor_name' => 'required|string|max:255',
            'groom_relationship_to_advisor' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_birthdate' => 'required|date',
            'bride_place_of_birth' => 'required|string|max:255',
            'bride_age' => 'required|integer|min:18',
            'bride_residence' => 'required|string|max:255',
            'bride_religion' => 'required|string|max:255',
            'bride_civil_status' => 'required|string|max:255',
            'bride_phone_number' => 'required|string|max:20',
            'bride_fathers_name' => 'required|string|max:255',
            'bride_citizenship' => 'required|string|max:255',
            'bride_advisor_name' => 'required|string|max:255',
            'bride_relationship_to_advisor' => 'required|string|max:255',
            'wedding_date' => 'required|date',
            'special_requests' => 'nullable|string|max:500',
        ]);


        wed::create([
            'user_id' => Auth::id(),
            'groom_name' => $this->groom_name,
            'groom_birthdate' => $this->groom_birthdate,
            'groom_place_of_birth' => $this->groom_place_of_birth,
            'groom_age' => $this->groom_age,
            'groom_residence' => $this->groom_residence,
            'groom_religion' => $this->groom_religion,
            'groom_civil_status' => $this->groom_civil_status,
            'groom_phone_number' => $this->groom_phone_number,
            'groom_fathers_name' => $this->groom_fathers_name,
            'groom_citizenship' => $this->groom_citizenship,
            'groom_advisor_name' => $this->groom_advisor_name,
            'groom_relationship_to_advisor' => $this->groom_relationship_to_advisor,
            'bride_name' => $this->bride_name,
            'bride_birthdate' => $this->bride_birthdate,
            'bride_place_of_birth' => $this->bride_place_of_birth,
            'bride_age' => $this->bride_age,
            'bride_residence' => $this->bride_residence,
            'bride_religion' => $this->bride_religion,
            'bride_civil_status' => $this->bride_civil_status,
            'bride_phone_number' => $this->bride_phone_number,
            'bride_fathers_name' => $this->bride_fathers_name,
            'bride_citizenship' => $this->bride_citizenship,
            'bride_advisor_name' => $this->bride_advisor_name,
            'bride_relationship_to_advisor' => $this->bride_relationship_to_advisor,
            'wedding_date' => $this->wedding_date,
            'special_requests' => $this->special_requests,
        ]);
        $this->notification()->success(
            $title = 'Wedding Data saved',
            $description = 'Wedding details saved successfully!'
        );

    }

    public function render()
    {
        return view('livewire.user.wedding');
    }
}
