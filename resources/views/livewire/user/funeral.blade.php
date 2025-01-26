<div class="p-6 bg-gray-50">
    <form wire:submit.prevent="submitForm" class="bg-white shadow-md rounded-lg p-6 border border-gray-200 space-y-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Funeral Details Form</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Name" />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <select wire:model="gender" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Religion -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Religion</label>
                <input type="text" wire:model="religion" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Religion" />
                @error('religion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Age -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" wire:model="age" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Age" />
                @error('age') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Place of Birth -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Place of Birth</label>
                <input type="text" wire:model="place_of_birth" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Place of Birth" />
                @error('place_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Date of Death -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Date of Death</label>
                <input type="date" wire:model="date_of_death" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" />
                @error('date_of_death') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Citizenship -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Citizenship</label>
                <input type="text" wire:model="citizenship" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Citizenship" />
                @error('citizenship') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Residence -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Residence</label>
                <input type="text" wire:model="residence" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Residence" />
                @error('residence') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Civil Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Civil Status</label>
                <input type="text" wire:model="civil_status" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Civil Status" />
                @error('civil_status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Occupation -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Occupation</label>
                <input type="text" wire:model="occupation" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Occupation" />
                @error('occupation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Funeral Date -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Funeral Date</label>
                <input type="date" wire:model="funeral_date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" />
                @error('funeral_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Contact Person Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Contact Person Name</label>
                <input type="text" wire:model="contact_person_name" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Contact Person Name" />
                @error('contact_person_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Additional Information -->
            <div class="col-span-full">
                <label class="block text-sm font-medium text-gray-700">Additional Information</label>
                <textarea wire:model="additional_information" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" rows="4" placeholder="Provide any additional details here"></textarea>
                @error('additional_information') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow hover:bg-blue-600">
                Submit Form
            </button>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div>
