<div>
    <div class="p-6 bg-gray-50">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>

        {{-- <div class="mt-6 p-6 bg-white shadow-md flex justify-center flex-col">
            <h2 class="text-xl font-bold text-blue-500 mb-2">Baptism Schedules</h2>
            <div id="weddingCalendar"></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var approvedEvents = @json($approvedSchedules);

                console.log("Approved Events:", approvedEvents); // Debugging

                let weddingDates = approvedEvents.map(event => event.start);

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
                            dayElem.style.backgroundColor = "#1d4ed8"; // Blue
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
        <form wire:submit.prevent="submitForm" class="bg-white shadow-md rounded-lg p-6 border border-gray-200 space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Baptism Registration Form</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Name of Child -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name of Child</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Child's Name" wire:model="child_name" />
                    @error('child_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="child_dob" />
                    @error('child_dob') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <select class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="child_gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('child_gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Place of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Place of Birth</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Place of Birth" wire:model="child_place_of_birth" />
                    @error('child_place_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Family Connection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Family Connection</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Family Connection" wire:model="family_connection" />
                    @error('family_connection') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Nationality -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nationality</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Nationality" wire:model="child_nationality" />
                    @error('child_nationality') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Name of Mother -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name of Mother</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Mother's Name" wire:model="mother_name" />
                    @error('mother_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Name of Father -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name of Father</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Father's Name" wire:model="father_name" />
                    @error('father_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Residence -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Residence</label>
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Residence" wire:model="residence" />
                    @error('residence') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Phone Number of Parents -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number of Parents</label>
                    <input type="tel"
                           class="w-full mt-1 border-gray-300 rounded-lg shadow-sm"
                           placeholder="Phone Number"
                           wire:model.lazy="parents_phone_number"
                           pattern="[0-9]{10,15}"
                           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                           maxlength="15" />
                    @error('parents_phone_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Preferred Baptism Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Preferred Baptism Date</label>
                    <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="preferred_baptism_date" />
                    @error('preferred_baptism_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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

            </div>

            <div class="text-right mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-600">
                    Submit Form
                </button>
            </div>
        </form>


    </div>
</div>
