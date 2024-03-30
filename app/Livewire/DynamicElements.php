<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use stdClass;

class DynamicElements extends Component
{
    public ?object $json = null;
    public int $key;
    public int $current_key = 0;
    public int $id;

    public function mount() {
        if ($this->json == NULL) {
            $this->json = new stdClass();
            $this->json->id = 0;
            $this->json->components = new stdClass();
        }
        $this->key = 0;
    }

    #[On('updateJSON')]
    public function updateJSON(string $updated_component, int $id) : void {
        $this->json->components->{$id} = json_decode($updated_component);
    }

    public function addElement(int $typeId) {
        $this->json->id++;  
        $this->json->components->{$this->json->id} = new stdClass();
        $this->json->components->{$this->json->id}->type_id = $typeId;
        $this->json->components->{$this->json->id}->shown = true;
        $this->current_key++;

        $content = new stdClass();

        switch ($typeId) {
            case 1:
                $content->title = "";

                $content->list = new stdClass();
                $content->list->name = "";
                $content->list->id = 0;
                $content->list->items = new stdClass();
                break;
            case 2:
                $content->test = "";
                break;
            default:
                unset($this->json->components->{$this->json->id});
                $this->json->id--;
                $this->current_key--;
                return;
        }

        $this->json->components->{$this->json->id}->content = $content;
    }

    public function removeComponent(int $component_id) {        
        foreach ($this->json->components as $component) {
            $this->key += $component->shown;
        }

        // unset($this->json->components->{$component_id});
        $this->json->components->{$component_id}->shown = 0;
    }

    public function save(int $id) {
        $article = Article::all()->find($id);
        $article->content = json_encode($this->json);
        $article->save();
        return redirect(route('editPage', ['id' => $id]));
    }

    public function load(int $id) {
        $article = Article::find($id);
        
        if ($article == NULL) {
            abort(404);
        } else {
            return view('index')->with(['json' => $article->content, 'id' => $id]);
        }
    }

    public function render() {
        return view('livewire.dynamic-elements');
    }
}
