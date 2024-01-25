<?php

namespace App\Livewire;

use App\Models\Testimony;
use Livewire\Component;

class Blog extends Component
{
    public $testimonies;

    public function mount()
    {
        $this->testimonies = Testimony::latest()->get();
    }

    public function render()
    {
        return view('livewire.blog');
    }
}
