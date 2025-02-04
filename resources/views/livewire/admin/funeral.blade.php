<div class="p-6 space-y-4">
    <h2 class="text-2xl font-bold">Funeral List</h2>
    <div class="mb-4 flex">
        <input
            type="text"
            wire:model="search"
            class="p-2 border border-gray-300 rounded-md w-full"
            placeholder="Search by Name"
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
                <th class="p-4">Name</th>
                <th class="p-4">Gender</th>
                <th class="p-4">Date of Death</th>
                <th class="p-4">Status</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funerals as $funeral)
                <tr class="border-t">
                    <td class="p-4">{{ $funeral->name }}</td>
                    <td class="p-4">{{ $funeral->gender }}</td>
                    <td class="p-4">{{ $funeral->date_of_death }}</td>
                    <td class="p-4">{{ ucfirst($funeral->status) }}</td>
                    <td class="p-4 space-x-2">
                        <button
                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700"
                            wire:click="viewDetails({{ $funeral->id }})"
                        >
                            View Details
                        </button>
                        <button
                            class="px-4 py-2 text-white {{ $funeral->status == 'approved' || $funeral->status == 'cancel' ? 'bg-gray-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-700' }} rounded"
                            wire:click="approve({{ $funeral->id }})"
                            {{ $funeral->status == 'approved' || $funeral->status == 'cancel' ? 'disabled' : '' }}
                        >
                            Approve
                        </button>
                        <button
                            class="px-4 py-2 text-white {{ $funeral->status == 'approved' || $funeral->status == 'cancel' ? 'bg-gray-500 cursor-not-allowed' : 'bg-red-500 hover:bg-red-700' }} rounded"
                            wire:click="cancel({{ $funeral->id }})"
                            {{ $funeral->status == 'approved' || $funeral->status == 'cancel' ? 'disabled' : '' }}
                        >
                            Cancel
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        No funeral records found.
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
                <h3 class="text-xl font-bold mb-4">Funeral Details</h3>

                @if ($selectedFuneral)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Basic Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Basic Details</h4>
                            <p><strong>Name:</strong> {{ $selectedFuneral->name }}</p>
                            <p><strong>Gender:</strong> {{ $selectedFuneral->gender }}</p>
                            <p><strong>Religion:</strong> {{ $selectedFuneral->religion }}</p>
                            <p><strong>Age:</strong> {{ $selectedFuneral->age }}</p>
                            <p><strong>Place of Birth:</strong> {{ $selectedFuneral->place_of_birth }}</p>
                            <p><strong>Date of Death:</strong> {{ $selectedFuneral->date_of_death }}</p>
                        </div>

                        <!-- Contact Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Contact Details</h4>
                            <p><strong>Citizenship:</strong> {{ $selectedFuneral->citizenship }}</p>
                            <p><strong>Residence:</strong> {{ $selectedFuneral->residence }}</p>
                            <p><strong>Contact Person Name:</strong> {{ $selectedFuneral->contact_person_name }}</p>
                        </div>

                        <!-- Additional Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Additional Details</h4>
                            <p><strong>Funeral Date:</strong> {{ $selectedFuneral->funeral_date }}</p>
                            <p><strong>Additional Information:</strong> {{ $selectedFuneral->additional_information }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($selectedFuneral->status) }}</p>
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
