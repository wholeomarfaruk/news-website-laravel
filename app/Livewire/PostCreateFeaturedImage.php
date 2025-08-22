<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

class PostCreateFeaturedImage extends Component
{
    use WithFileUploads;
    public $featured_image;
    public function render()
    {
        return view('livewire.post-create-featured-image');
    }

}
