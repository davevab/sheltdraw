<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Photo extends Component
{

    use WithFileUploads;

    #[Validate('image|max:1024')] // 1MB Max
    public $photo;

    public function save()
    {
        $this->validate();

        // Save the photo and get the path
        $photoPath = $this->photo->store('photos', 'public');

        // Emit an event to notify the view about the saved photo path
        $this->emit('photoSaved', $photoPath);
    }

    public function render()
    {
        return view('livewire.photo');
    }
}
