<?php

namespace App\Livewire;

use App\Models\Ad;
use Livewire\Component;

class AdComponent extends Component
{
    public $ad;
    public function mount($id=1)
    {
        $id = $id ?? 1;

        $this->ad = $ad = Ad::find($id);
            if (!$this->ad->status != 1) {
            $id = 1;
        }
        if(date('Y-m-d', strtotime($this->ad->expire_at)) < date('Y-m-d')) {
            $id = 1;
        }
        if (!$this->ad?->media()?->where('category', 'image')?->first() || !file_exists($this->ad?->media()?->where('category', 'image')?->first()?->path)) {
            $id = 1;
        }

        $this->ad = Ad::find($id);

    }
    public function render()
    {
        if (!$this->ad) {
            return;
        }

        return view('livewire.ad-component');
    }
}
