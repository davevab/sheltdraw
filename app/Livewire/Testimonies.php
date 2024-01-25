<?php

namespace App\Livewire;

use App\Models\Testimony;
use Livewire\Component;
use Livewire\WithFileUploads;

class Testimonies extends Component
{
    use WithFileUploads;

    public $photo;
    public $testimonial;

    public $testimonies;

    public function mount()
    {
        $this->testimonies = Testimony::latest()->get();
    }


    public function submitTestimony()
    {
        $this->validate([
            'photo' => 'image|max:1024', // Adjust max file size as needed
            'testimonial' => 'required|string',
        ]);

        $uploadedPhoto = $this->photo->store('testimony-photos', 'public');

        Testimony::create([
            'user_id' => auth()->user()->id,
            'photo_path' => $uploadedPhoto,
            'testimonial' => $this->testimonial,
        ]);

        // Clear form fields after successful submission
        $this->photo = null;
        $this->testimonial = null;

        session()->flash('message', 'Testimony submitted successfully!');

        // Fetch testimonies after a new one is submitted
        $this->testimonies = Testimony::latest()->get();
    }

    public function render()
    {
        return view('livewire.testimonies');
    }
}
