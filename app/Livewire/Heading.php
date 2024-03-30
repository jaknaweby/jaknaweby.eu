<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use stdClass;

class Heading extends Component
{
    public int $component_id;
    public string $path;
    public stdClass $current_component;

    public function updated($property) { // When some of the variables is updated
        if (str_starts_with($property, 'current_component'))
            $this->update();
    }

    public function update() {
        $this->dispatch('updateJSON', json_encode($this->current_component), $this->component_id);
    }

    #[On('updateList.{path}')]
    public function updateList(string $component) {
        $this->current_component->content->list = json_decode($component);
        $this->update();
    }

    public function render() {
        return view('livewire.heading');
    }
}
