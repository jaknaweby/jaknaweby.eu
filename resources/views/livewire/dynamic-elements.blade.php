@php
    $article = App\Models\Article::all()->find($id);
@endphp

<div class="w-11/12 mx-auto mt-5">
    {{-- Write to JSON --}}
    <div class="mb-5">
        <button type="button" wire:click="addElement(1)" class="bg-slate-200 px-6 py-1.5 font-normal rounded">Add image component</button>
    </div>

    @if ($json != NULL)
        @foreach ($json->components as $component_id => $component)
            @if (!$component->shown)
                @continue
            @endif

            @switch($component->type_id)
                @case(1)
                    @livewire('heading', ['current_component' => $component, 'component_id' => $component_id, 'path' => $component_id], key($key++))
                    @break
                @case(2)
                    @livewire('test', key($component_id))
                    @break
                @default
                    <p>Invadit type ID</p>
                    @continue2
            @endswitch

            <button type="button" wire:click="removeComponent({{ $component_id }})" class="bg-red-200 text-sm px-6 py-1.5 font-normal rounded">Remove</button>
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