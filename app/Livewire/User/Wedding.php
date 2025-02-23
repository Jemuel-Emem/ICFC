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
    protected function rules()
    {
        return [
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
        ];
    }

    public function submitForm()
    {
        $this->validate();
        if (wed::where('wedding_date', $this->wedding_date)->exists()) {
            $this->notification()->error('Error', 'A wedding is already scheduled on this date.');
            return;
        }

        wed::create(array_merge($this->only([
            'groom_name', 'groom_birthdate', 'groom_place_of_birth', 'groom_age',
            'groom_residence', 'groom_religion', 'groom_civil_status', 'groom_phone_number',
            'groom_fathers_name', 'groom_citizenship', 'groom_advisor_name', 'groom_relationship_to_advisor',
            'bride_name', 'bride_birthdate', 'bride_place_of_birth', 'bride_age',
            'bride_residence', 'bride_religion', 'bride_civil_status', 'bride_phone_number',
            'bride_fathers_name', 'bride_citizenship', 'bride_advisor_name', 'bride_relationship_to_advisor',
            'wedding_date', 'special_requests'
        ]), ['user_id' => Auth::id()]));

        $this->notification()->success(
            $title = 'Wedding Data saved',
            $description = 'Wedding details saved successfully!'
        );

        return redirect()->route('user-dashboard');

    }
    public function updatedGroomBirthdate($value)
    {
        $this->groom_age = $this->calculateAge($value);
    }

    public function updatedBrideBirthdate($value)
    {
        $this->bride_age = $this->calculateAge($value);
    }

    private function calculateAge($birthdate)
    {
        return \Carbon\Carbon::parse($birthdate)->age;
    }
    // public function render()
    // {
    //     return view('livewire.user.wedding');
    // }

    public function getScheduledWeddingDates()
{
    return Wed::pluck('wedding_date')->toArray();
}

public function getApprovedSchedules()
{
    return Wed::select('wedding_date as date') // Adjust based on your table structure
        ->where('status', 'approved')
        ->get()
        ->toArray();
}

public function render()
{
    return view('livewire.user.wedding', [
        'approvedSchedules' => $this->getApprovedSchedules(),
        'totalWeddings' => Wed::where('status', 'approved')->count(),
    ]);
}
}
