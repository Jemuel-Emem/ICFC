<div class="p-6 space-y-4">
    <h2 class="text-2xl font-bold">Weddings List</h2>
    <div class="mb-4 flex">
        <input
            type="text"
            wire:model="search"
            class="p-2 border border-gray-300 rounded-md w-full"
            placeholder="Search by Bride or Groom's Name"
        />
        <button wire:click="sa" class="bg-green-500 text-white ml-2 p-2 w-32">Search</button>
    </div>

    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-200 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-4">Bride's Name</th>
                <th class="p-4">Groom's Name</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($weddings as $wedding)
                <tr class="border-t">
                    <td class="p-4">{{ $wedding->bride_name }}</td>
                    <td class="p-4">{{ $wedding->groom_name }}</td>
                    <td class="p-4 space-x-2">
                        <button
                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700"
                            wire:click="viewDetails({{ $wedding->id }})"
                        >
                            View Details
                        </button>
                        <button
                            class="px-4 py-2 text-white {{ $wedding->status == 'approved' || $wedding->status == 'canceled' ? 'bg-gray-500 cursor-not-allowed' : 'bg-green-500 hover:bg-green-700' }} rounded"
                            wire:click="approve({{ $wedding->id }})"
                            {{ $wedding->status == 'approved' || $wedding->status == 'canceled' ? 'disabled' : '' }}
                        >
                            Approve
                        </button>

                        <button
                            class="px-4 py-2 text-white {{ $wedding->status == 'approved' || $wedding->status == 'canceled' ? 'bg-gray-500 cursor-not-allowed' : 'bg-red-500 hover:bg-red-700' }} rounded"
                            wire:click="cancel({{ $wedding->id }})"
                            {{ $wedding->status == 'approved' || $wedding->status == 'canceled' ? 'disabled' : '' }}
                        >
                            Cancel
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        No weddings found.
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
                <h3 class="text-xl font-bold mb-4">Wedding Details</h3>

                @if ($selectedWedding)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div>
                            <h4 class="text-lg font-semibold mb-2">Bride's Details</h4>
                            <p><strong>Name:</strong> {{ $selectedWedding->bride_name }}</p>
                            <p><strong>Birthdate:</strong> {{ $selectedWedding->bride_birthdate }}</p>
                            <p><strong>Place of Birth:</strong> {{ $selectedWedding->bride_place_of_birth }}</p>
                            <p><strong>Age:</strong> {{ $selectedWedding->bride_age }}</p>
                            <p><strong>Residence:</strong> {{ $selectedWedding->bride_residence }}</p>
                            <p><strong>Religion:</strong> {{ $selectedWedding->bride_religion }}</p>
                            <p><strong>Civil Status:</strong> {{ $selectedWedding->bride_civil_status }}</p>
                            <p><strong>Phone Number:</strong> {{ $selectedWedding->bride_phone_number }}</p>
                            <p><strong>Father's Name:</strong> {{ $selectedWedding->bride_fathers_name }}</p>
                            <p><strong>Citizenship:</strong> {{ $selectedWedding->bride_citizenship }}</p>
                            <p><strong>Person Giving Consent:</strong> {{ $selectedWedding->bride_advisor_name }}</p>
                            <p><strong>Relationship to Advisor:</strong> {{ $selectedWedding->bride_relationship_to_advisor }}</p>

                        </div>

                        <!-- Groom Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Groom's Details</h4>
                            <p><strong>Name:</strong> {{ $selectedWedding->groom_name }}</p>
                            <p><strong>Birthdate:</strong> {{ $selectedWedding->groom_birthdate }}</p>
                            <p><strong>Place of Birth:</strong> {{ $selectedWedding->groom_place_of_birth }}</p>
                            <p><strong>Age:</strong> {{ $selectedWedding->groom_age }}</p>
                            <p><strong>Residence:</strong> {{ $selectedWedding->groom_residence }}</p>
                            <p><strong>Religion:</strong> {{ $selectedWedding->groom_religion }}</p>
                            <p><strong>Civil Status:</strong> {{ $selectedWedding->groom_civil_status }}</p>
                            <p><strong>Phone Number:</strong> {{ $selectedWedding->groom_phone_number }}</p>
                            <p><strong>Father's Name:</strong> {{ $selectedWedding->groom_fathers_name }}</p>
                            <p><strong>Citizenship:</strong> {{ $selectedWedding->groom_citizenship }}</p>
                            <p><strong>Person Giving Consent:</strong> {{ $selectedWedding->groom_advisor_name }}</p>
                            <p><strong>Relationship to Advisor:</strong> {{ $selectedWedding->groom_relationship_to_advisor }}</p>
                        </div>

                        <!-- Wedding Details -->
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Wedding Details</h4>
                            <p><strong>Wedding Date:</strong> {{ $selectedWedding->wedding_date }}</p>
                            <p><strong>Special Requests:</strong></p>
                            <p>{{ $selectedWedding->special_requests }}</p>

                            <p><strong>Email:</strong> {{ $selectedWedding->user->email ?? 'No email found' }}</p>
                            @if ($selectedWedding->requirements)
                            <div class="mt-4">
                                <h4 class="text-lg font-semibold">Requirement</h4>
                                <img src="{{ Storage::url($selectedWedding->requirements) }}" alt="Requirement Image" class="w-full max-w-xs rounded-lg shadow-md">
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
