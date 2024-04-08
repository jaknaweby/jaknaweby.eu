<?php

namespace App\Livewire;

use Livewire\Component;

class DisplayPreview extends Component
{
    public int $id;
    public $content;
    public $isPreview;
    public $element = "p";

    public function render()
    {
        return view('livewire.display-preview');
    }
}
