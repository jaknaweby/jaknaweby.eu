<div class="mb-2">
    @if ($current_component->shown)
    <div class="{{$component_id}}.paragraphs">
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input type="text" name="title" id="title" wire:model.live="current_component.content.title" class="border-gray-300 block py-1.5 px-3.5 rounded w-full" />
        {{-- <input type="text" name="title" id="title" wire:model.live="current_component.content.title" class="border-gray-300 block py-1.5 px-3.5 rounded w-full"> --}}
    </div>
    
    <div class="ml-5 mt-3">
        @livewire('list-of', ['current_component' => $current_component->content->list, 'parent_path' => $path, 'name' => 'paragraphs'])
    </div>
    
    {{-- <details>
        <summary>Current component</summary>
        <pre>{{ print_r($current_component) }}</pre>
    </details> --}}
    @endif
</div>
