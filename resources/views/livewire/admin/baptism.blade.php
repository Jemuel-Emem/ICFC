<div class="p-6 space-y-4">
    <h2 class="text-2xl font-bold">Baptism List</h2>
    <div class="mb-4 flex">
        <input
            type="text"
            wire:model="search"
            class="p-2 border border-gray-300 rounded-md w-full"
            placeholder="Search by Child's Name"
        />

        <button wire:click="sa" class="bg-green-500 text-white ml-2 p-2 w-64 rounded">Search</button>
    </div>
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-200 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-4">Child's Name</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($baptisms as $baptism)
                <tr class="border-t">
                    <td class="p-4">{{ $baptism->child_name }}</td>
                    <td class="p-4 space-x-2">
                        <button
                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700"
                            wire:click="viewDetails({{ $baptism->id }})"
                        >
                            View Details
                        </button>
                        <button
                            class="px-4 py-2 text-white {{ $baptism->status == 'approved' || $baptism->status == 'cancel' ? 'bg-gray-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-700' }} rounded"
                            wire:click="approve({{ $baptism->id }})"
                            {{ $baptism->status == 'approved' || $baptism->status == 'cancel' ? 'disabled' : '' }}
                        >
                            Approve
                        </button>

                        <button
                            class="px-4 py-2 text-white {{ $baptism->status == 'approved' || $baptism->status == 'cancel' ? 'bg-gray-500 cursor-not-allowed' : 'bg-red-500 hover:bg-red-700' }} rounded"
                            wire:click="cancel({{ $baptism->id }})"
                            {{ $baptism->status == 'approved' || $baptism->status == 'cancel' ? 'disabled' : '' }}
                        >
                            Cancel
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="p-4 text-center text-gray-500">
                        No baptisms found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($showModal)
        <div
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
            x-data="{ show: @entangle('showModal') }"
            x-show="show"
            x-cloak
        >
            <div class="bg-white rounded-lg shadow-lg p-6 w-2/3">
                <h3 class="text-xl font-bold mb-4">Baptism Details</h3>

                @if ($selectedBaptism)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div>
                            <h4 class="text-lg font-semibold mb-2">Child's Details</h4>
                            <p><strong>Name:</strong> {{ $selectedBaptism->child_name }}</p>
                            <p><strong>Date of Birth:</strong> {{ $selectedBaptism->child_dob }}</p>
                            <p><strong>Place of Birth:</strong> {{ $selectedBaptism->child_place_of_birth }}</p>
                            <p><strong>Gender:</strong> {{ $selectedBaptism->child_gender }}</p>
                            <p><strong>Nationality:</strong> {{ $selectedBaptism->child_nationality }}</p>
                            <p><strong>Family Connection:</strong> {{ $selectedBaptism->family_connection }}</p>
                        </div>


                        <div>
                            <h4 class="text-lg font-semibold mb-2">Parent's Details</h4>
                            <p><strong>Mother's Name:</strong> {{ $selectedBaptism->mother_name }}</p>
                            <p><strong>Father's Name:</strong> {{ $selectedBaptism->father_name }}</p>
                            <p><strong>Residence:</strong> {{ $selectedBaptism->residence }}</p>
                            <p><strong>Phone Number:</strong> {{ $selectedBaptism->parents_phone_number }}</p>
                        </div>

                        <!-- Baptism Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Baptism Details</h4>
                            <p><strong>Preferred Baptism Date:</strong> {{ $selectedBaptism->preferred_baptism_date }}</p>
                            <p><strong>Email:</strong> {{ $selectedBaptism->user->email ?? 'N/A' }}</p>

                            @if ($selectedBaptism->requirements)
                            <div class="mt-4">
                                <h4 class="text-lg font-semibold">Requirement</h4>
                                <img src="{{ Storage::url($selectedBaptism->requirements) }}" alt="Requirement Image" class="w-full max-w-xs rounded-lg shadow-md">
                            </div>
                        @endif
                        </div>
                    </div>
                @endif

                <div class="mt-6 text-right">
                    <button
                        class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700"
                        wire:click="closeModal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
