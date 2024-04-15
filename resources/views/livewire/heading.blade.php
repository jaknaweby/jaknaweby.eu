<div class="mb-2">
    <div>
        <x-input-label for="{{ $component_id }}.title" value="Title" />
        <x-text-input type="text" id="{{ $component_id }}.title" wire:model.live="current_component.content.title" class="border-gray-300 block py-1.5 px-3.5 rounded w-full" />
    </div>
    
    <div class="ml-5 mt-3">
        @livewire('list-of', ['current_component' => $current_component->content->list, 'parent_path' => $path, 'name' => 'paragraph'])
    </div>

    {{-- <pre>
        {{ print_r($current_component) }}
    </pre> --}}
</div>
