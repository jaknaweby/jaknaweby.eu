<div class="mb-2">
    @if ($current_component->shown)
        <div class="{{$component_id}}.paragraphs">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" wire:model.live="current_component.content.title">
        </div>
        
        @livewire('list-of', ['current_component' => $current_component->content->list, 'parent_path' => $path, 'name' => 'paragraphs'])
        
        {{-- <details>
            <summary>Current component</summary>
            <pre>{{ print_r($current_component) }}</pre>
        </details> --}}
    @endif
</div>
