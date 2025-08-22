<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component

{
    public  $profile;
    public $email;
    public $name;
    public $title;
    public function render()
    {
        return view('livewire.profile');
    }
}
