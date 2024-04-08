<?php

namespace App\Livewire;

use Livewire\Component;

class ListOf extends Component
{
    public object $current_component;
    public string $parent_path;
    public string $name;

    public function addToList() : void {
        $this->current_component->items->{++$this->current_component->id} = "";
        $this->updateParentJSON();
    }

    public function swapItems($first, $second) : void {
        $temp = $this->current_component->items->{$first};
        $this->current_component->items->{$first} = $this->current_component->items->{$second};
        $this->current_component->items->{$second} = $temp;
        $this->updateParentJSON();
    }

    public function removeFromList($item_id) : void {
        for ($i = $item_id; $i < $this->current_component->id; $i++)
            $this->current_component->items->{$i} = $this->current_component->items->{$i + 1};
        unset($this->current_component->items->{$this->current_component->id});

        $this->current_component->id--;
        $this->updateParentJSON();
    }

    public function updated($property) : void {
        if (str_starts_with($property, 'current_component'))
            $this->updateParentJSON();
    }

    public function updateParentJSON() {
        $this->dispatch("updateList.{$this->parent_path}", json_encode($this->current_component));
    }

    public function mount() : void { // When the component is being initialized - constructor
        if ($this->current_component->name == null) {
            $this->current_component->name = $this->name;
        } else {
            $this->name = $this->current_component->name;
        }
    }

    public function render() {
        return view('livewire.list-of');
    }
}
