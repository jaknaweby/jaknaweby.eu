<?php

namespace App\Livewire;

use Livewire\Component;

class DisplayPreview extends Component
{
    public int $id;
    public $content;
    public $isPreview;

    public function render()
    {
        return view('livewire.display-preview');
    }
}
