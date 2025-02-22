<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\updates as Update; // Import the Update model

class Updtes extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $title,$updateId;
    public $content;
    public $image;
    public $video;

    public function render()
    {
        return view('livewire.admin.updtes', [
            'updates' => Update::latest()->get() // Fetch updates and pass to view
        ]);
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->video = null;
    }

    public function saveUpdate()
    {
        // Validate the form data
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:1024', // 1MB Max for images
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:10240', // 10MB Max for videos
        ]);

        // Handle the image upload
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('updates/images', 'public');
        }

        // Handle the video upload
        $videoPath = null;
        if ($this->video) {
            $videoPath = $this->video->store('updates/videos', 'public');
        }

        // Save the update to the database
        Update::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
            'video' => $videoPath,
        ]);

        // Close the modal and reset the form
        $this->closeModal();


    }

    public function editUpdate($id)
    {
        $update = Update::findOrFail($id);
        $this->updateId = $id;
        $this->title = $update->title;
        $this->content = $update->content;
        $this->showModal = true;
    }

    public function deleteUpdate($id)
    {
        Update::findOrFail($id)->delete();
        $this->notification()->success('Deleted', 'Update has been removed.');
        $this->dispatch('refreshList');
    }


}
