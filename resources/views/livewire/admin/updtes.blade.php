<div>
    <!-- Add Update Button -->
    <div class="flex justify-end mb-4">
        <button wire:click="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">Add Updates</button>
    </div>

    <!-- Updates Table -->
    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Content</th>
                <th class="border p-2">Image</th>
                <th class="border p-2">Video</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($updates as $update)
                <tr class="border">
                    <td class="border p-2">{{ $update->title }}</td>
                    <td class="border p-2">{{ Str::limit($update->content, 50) }}</td>
                    <td class="border p-2">
                        @if ($update->image)
                            <img src="{{ asset('storage/' . $update->image) }}" class="w-16 h-16 rounded">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="border p-2">
                        @if ($update->video)
                            <a href="{{ asset('storage/' . $update->video) }}" target="_blank" class="text-blue-500 underline">View Video</a>
                        @else
                            No Video
                        @endif
                    </td>
                    <td class="border p-2">
                        <button wire:click="editUpdate({{ $update->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                        <button wire:click="deleteUpdate({{ $update->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">{{ $updateId ? 'Edit Update' : 'Add Update' }}</h2>

                    <!-- Form -->
                    <form wire:submit.prevent="saveUpdate">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" wire:model="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea wire:model="content" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" wire:model="image">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-16 h-16 rounded">
                            @endif
                            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Video</label>
                            <input type="file" wire:model="video">
                            @error('video') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
