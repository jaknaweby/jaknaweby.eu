<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use stdClass;
use Illuminate\Support\Facades\Log;

class DynamicElements extends Component
{
    public ?object $json = null;
    public int $key;
    public int $current_key = 0;
    public int $id;
    public bool $showError = false;
    public string $message;
    public stdClass $detailsOpen;

    public function mount() {
        $detailsOpen = new stdClass();

        $this->json = json_decode(\App\Models\Article::all()->find($this->id)->content);
        if ($this->json == NULL) {
            $this->json = new stdClass();
            $this->json->id = 0;
            $this->json->components = new stdClass();
        }
        $this->key = 0;
    }

    public function toggleDetails(int $id) {
        if (!isset($this->detailsOpen)) {
            $this->detailsOpen = new stdClass();
        }

        if (!isset($this->detailsOpen->{$id})) {
            $this->detailsOpen->{$id} = true;
        } else {
            unset($this->detailsOpen->{$id});
        }
        // $this->detailsOpen->{0} = true;
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
            case 2:
                $content->title = "";

                $content->list = new stdClass();
                $content->list->name = "";
                $content->list->id = 0;
                $content->list->items = new stdClass();
                break;
            // case 2:
            //     $content->title = "";

            //     $content->list = new stdClass();
            //     $content->list->name = "";
            //     $content->list->id = 0;
            //     $content->list->items = new stdClass();
            //     break;
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
        if (isset($this->json->components->{$component_id})) {
            $this->json->components->{$component_id}->shown = 0;
        }
    }

    public function save(int $id) {
        $article = Article::all()->find($id);

        if ($this->validate_json($this->json) == true || true) { // ...
            $article->content = json_encode($this->json);
            $article->save();
            return redirect(route('editPage', ['id' => $id]));
        } else {
            $this->showError = true;
        }
    }

    // Is not working properly
    public function validate_json(object $validated_json) {
        $this->message = '';
        foreach ($this->json->components as $key => $component_value) {
            if ($component_value->shown == false) { continue; } // Skip removed components

            foreach ($component_value->content->list->items as $key => $value) {
                $in_tag = false;
                $tag_name = "";
                $current_tags = [];
                $allowed_tags = ['/strong', '/em', '/u'];

                for ($i = 0; $i < strlen($value); $i++) { 
                    // Validate each text
                    if ($value[$i] == "<") {
                        if ($in_tag == false) {
                            $in_tag = true;
                        } else {
                            return false; // Error - trying to open a tag inside a tag name
                        }
                    } else if ($value[$i] == ">") {
                        if ($in_tag == false) {
                            return false; // Error - trying to enclose a tag, while there is no opened
                        } else {
                            // check whether name is allowed
                            if (in_array($tag_name, $allowed_tags) || in_array('/' . $tag_name, $allowed_tags)) {
                                if (str_starts_with($tag_name, '/')) {
                                    array_splice($current_tags, array_search($tag_name, $current_tags), 1);
                                } else {
                                    array_push($current_tags, $tag_name);
                                }
                                $tag_name = "";
                            } else {
                                return false; // Error - the tag name is not allowed
                            }
                        }
                    }
                }

                $this->message .= $value . "\n";
            }
        }

        return true;
    }

    public function redirectTo(int $id) {
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
