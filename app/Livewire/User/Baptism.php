<?php

namespace App\Livewire\User;
use Carbon\Carbon;
use App\Models\Baptism as Bapt;
use WireUi\Traits\Actions;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Baptism extends Component
{
    use Actions;
    use WithFileUploads;
    public $child_name,$requirements, $child_gender, $child_dob, $child_place_of_birth;
    public $father_name, $mother_name, $residence, $parents_phone_number;
    public $preferred_baptism_date, $time_schedule, $additional_information,$family_connection,$child_nationality;
    public $scheduledBaptisms = [];

    // Validation Rules
    protected function rules()
    {
        return [
            'child_name' => 'required|string|max:255',
            'child_gender' => 'required|in:Male,Female',
            'child_dob' => 'required|date',
            'child_place_of_birth' => 'nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'residence' => 'nullable|string|max:255',
            'parents_phone_number' => 'required|string|max:15',
            'preferred_baptism_date' => 'required|date|after_or_equal:' . Carbon::today()->toDateString(),
            'time_schedule' => 'required|string|max:20',
            'additional_information' => 'nullable|string',
            'requirements' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ];
    }
    public function submitForm()
    {
        $this->validate();
        $existingBaptism = Bapt::where('preferred_baptism_date', $this->preferred_baptism_date)
        ->where('time_schedule', $this->time_schedule)
        ->where('status', 'approved')
        ->exists();

    if ($existingBaptism) {
        $this->notification()->error(
            'Time Slot Unavailable',
            'The selected baptism date and time are already booked. Please choose another time.'
        );
        return;
    }
        // Check if the selected baptism date is already booked
        // $existingBaptism = Bapt::where('preferred_baptism_date', $this->preferred_baptism_date)->exists();

        // if ($existingBaptism) {
        //     $this->notification()->error(
        //         $title = 'Date Unavailable',
        //         $description = 'The selected baptism date is already booked. Please choose another date.'
        //     );
        //     return;
        // }
        $filePath = null;
        if ($this->requirements) {
            $filePath = $this->requirements->store('requirements', 'public'); // Store the file
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
            'time_schedule' => $this->time_schedule,
            'additional_information' => $this->additional_information,
            'status' => 'pending',
            'requirements' => $filePath,
        ]);

        $this->notification()->success(
            $title = 'Baptism Data Saved',
            $description = 'Baptism registration submitted successfully!'
        );

        $this->reset();
        return redirect()->route('user-dashboard');
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
