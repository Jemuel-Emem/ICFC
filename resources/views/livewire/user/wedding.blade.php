<div class="p-6 bg-gray-50">
    <!-- Wedding Date Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

{{--
    <div class="mt-6 p-6 bg-white shadow-md flex justify-center flex-col">
        <h2 class="text-xl font-bold text-green-500 mb-2">Wedding Schedules</h2>
        <div id="weddingCalendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var approvedEvents = @json($approvedSchedules);

            console.log("Approved Events:", approvedEvents); // Debugging

            let weddingDates = approvedEvents.map(event => event.date);

            console.log("Wedding Dates:", weddingDates);

            flatpickr("#weddingCalendar", {
                inline: true,
                dateFormat: "Y-m-d",
                disableMobile: true,
                enable: weddingDates,
                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    let date = fp.formatDate(fp.parseDate(dayElem.dateObj), "Y-m-d");

                    if (weddingDates.includes(date)) {
                        dayElem.style.borderRadius = "50%";
                        dayElem.style.padding = "5px";
                        dayElem.style.backgroundColor = "#16a34a"; // Green
                        dayElem.style.color = "white";

                        let eventLabel = document.createElement("span");
                        eventLabel.innerText = "✓";
                        eventLabel.style.fontSize = "10px";
                        eventLabel.style.display = "block";
                        eventLabel.style.fontWeight = "bold";
                        dayElem.appendChild(eventLabel);
                    }
                }
            });
        });
    </script> --}}

    <form class="bg-white shadow-md rounded-lg p-6 border border-gray-200 space-y-6" wire:submit.prevent="submitForm">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Wedding Details Form</h2>

      <div class="space-y-4">
        <h3 class="text-xl font-semibold text-gray-700">Groom's Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Groom's Name" wire:model="groom_name" />
                @error('groom_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="groom_birthdate" />
                @error('groom_birthdate') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Place of Birth</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Place of Birth" wire:model="groom_place_of_birth" />
                @error('groom_place_of_birth') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        {{-- <div>
    <label class="block text-sm font-medium text-gray-700">Age</label>
    <input type="number" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="groom_age" readonly />
</div> --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Residence</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Residence" wire:model="groom_residence" />
                @error('groom_residence') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Religion</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Religion" wire:model="groom_religion" />
                @error('groom_religion') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Civil Status</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Civil Status" wire:model="groom_civil_status" />
                @error('groom_civil_status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input
                    type="text"
                    class="w-full mt-1 border-gray-300 rounded-lg shadow-sm"
                    placeholder="Phone Number"
                    wire:model="groom_phone_number"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                />
                @error('groom_phone_number')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Father's Name" wire:model="groom_fathers_name" />
                @error('groom_fathers_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Citizenship</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Citizenship" wire:model="groom_citizenship" />
                @error('groom_citizenship') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Person Giving Consent or Advice</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Name of Person" wire:model="groom_advisor_name" />
                @error('groom_advisor_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Relationship to Advisor</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Relationship" wire:model="groom_relationship_to_advisor" />
                @error('groom_relationship_to_advisor') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-xl font-semibold text-gray-700">Bride's Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Bride's Name" wire:model="bride_name" />
                @error('bride_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="bride_birthdate" />
                @error('bride_birthdate') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Place of Birth</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Place of Birth" wire:model="bride_place_of_birth" />
                @error('bride_place_of_birth') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            {{-- <div>
                <label class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Age" wire:model="bride_age" />
                @error('bride_age') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div> --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Residence</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Residence" wire:model="bride_residence" />
                @error('bride_residence') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Religion</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Religion" wire:model="bride_religion" />
                @error('bride_religion') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Civil Status</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Civil Status" wire:model="bride_civil_status" />
                @error('bride_civil_status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input  oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                maxlength="11" type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Phone Number" wire:model="bride_phone_number" />
                @error('bride_phone_number') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Father's Name" wire:model="bride_fathers_name" />
                @error('bride_fathers_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Citizenship</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Citizenship" wire:model="bride_citizenship" />
                @error('bride_citizenship') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Person Giving Consent or Advice</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Name of Person" wire:model="bride_advisor_name" />
                @error('bride_advisor_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Relationship to Advisor</label>
                <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Relationship" wire:model="bride_relationship_to_advisor" />
                @error('bride_relationship_to_advisor') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="space-y-4">
        <h3 class="text-xl font-semibold text-gray-700">Wedding Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Wedding Date</label>
                <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="wedding_date" />
                @error('wedding_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Time Schedule</label>
                <select class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="time_schedule">
                    <option value="">Select Time Slot</option>
                    <option value="8am-11am">8am - 11am</option>
                    <option value="11am-1pm">11am - 1pm</option>
                    <option value="1pm-3pm">1pm - 3pm</option>
                    <option value="3pm-5pm">3pm - 5pm</option>
                </select>
                @error('time_schedule') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Upload Requirement</label>
                <input type="file" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="requirements">
                @error('requirements') <span class="text-sm text-red-600">{{ $message }}</span> @enderror

                @if ($requirements)
                    <p class="mt-2 text-sm text-gray-500">Uploaded file: {{ $requirements->getClientOriginalName() }}</p>
                @endif
            </div>

            <div class="col-span-3">
                <label class="block text-sm font-medium text-gray-700">Special Requests</label>
                <textarea class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" rows="4" placeholder="Any special requests" wire:model="special_requests"></textarea>
                @error('special_requests') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>


      <div class="text-end">
        <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-600">
          Submit Form
        </button>
      </div>
    </form>
</div>
