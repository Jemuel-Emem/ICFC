<div>
    <div class="p-6 bg-gray-50">
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
                    <input type="text" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" placeholder="Phone Number" wire:model="parents_phone_number" />
                    @error('parents_phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Preferred Baptism Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Preferred Baptism Date</label>
                    <input type="date" class="w-full mt-1 border-gray-300 rounded-lg shadow-sm" wire:model="preferred_baptism_date" />
                    @error('preferred_baptism_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
