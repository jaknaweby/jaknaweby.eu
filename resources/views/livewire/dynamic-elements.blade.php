@php
    $article = App\Models\Article::all()->find($id);
@endphp


<div class="w-11/12 mx-auto mt-5">    
    @if ($showError)
        <div>
            Cannot save the content - the HTML content seems to been updated using dev tools
        </div>
    @endif

    {{-- Write to JSON --}}
    <div class="mb-5">
        <x-secondary-button type="button" wire:click="addElement(1)" class="mt-2 !bg-indigo-800 !text-white border-0 hover:!bg-indigo-900 focus:!outline-none focus:!ring-2 focus:!ring-indigo-500 focus:!ring-offset-2">
            Add title component
        </x-secondary-button>

        <x-secondary-button type="button" wire:click="addElement(2)" class="mt-2 !bg-indigo-800 !text-white border-0 hover:!bg-indigo-900 focus:!outline-none focus:!ring-2 focus:!ring-indigo-500 focus:!ring-offset-2">
            Add subtitle component
        </x-secondary-button>
    </div>

    @if ($json != NULL)
        @foreach ($json->components as $component_id => $component)
            @if (!$component->shown)
                @continue
            @endif

            <details class="mt-10" {{ isset($detailsOpen->{$component_id}) ? 'open' : '' }}>
                <summary wire:click.prevent="toggleDetails({{ $component_id }})">{{ trim($component->content->title) == "" ?  "Component ID $component_id" : trim($component->content->title) }}</summary>

                @switch($component->type_id)
                    @case(1)
                    @case(2)
                        @livewire('heading', ['current_component' => $component, 'component_id' => $component_id, 'path' => $component_id], key($key++))
                        @break
                    @case(3)
                        @livewire('image', ['current_component' => $component, 'component_id' => $component_id, 'path' => $component_id], key($key++))
                        @break
                    @default
                        <p>Invalid type ID - {{ $component->type_id }}</p>
                        @break
                @endswitch
            </details>

            <x-secondary-button wire:click="removeComponent({{ $component_id }})" class="mt-1 !bg-red-800 hover:!bg-red-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                Remove component
            </x-secondary-button>
        @endforeach
    @endif

    {{-- Read from JSON --}}
    @if ($json != null)
        <div class="mt-5">
            @livewire('display-preview', ['content' => json_encode($json), 'isPreview' => true, 'id' => $id], key(json_encode($json)))
        </div>
    @endif

    <x-primary-button type="button" wire:click="save({{ $id }})" wire:confirm="Are you sure you want to save the changes?" class="mt-5">
        Apply changes
    </x-primary-button>

    <x-secondary-button type="button" wire:click="redirectTo({{ $id }})" wire:confirm="Are you sure you want to discard the changes?" class="mt-2 !block !bg-red-800 !text-white border-0 hover:!bg-red-900 focus:!outline-none focus:!ring-2 focus:!ring-red-500 focus:!ring-offset-2">
        Discard changes
    </x-secondary-button>
</div>