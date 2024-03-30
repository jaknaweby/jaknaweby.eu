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

    @if ($json)
        <h3>JSON</h3>
        <pre>
            {{ json_encode($json) }}
        </pre>
    @endif

    {{-- Read from JSON --}}
    <hr>
    @if ($json != null)
        @include('display-preview', ['content' => json_encode($json), 'id' => $id, 'showButton' => false])
    @endif

    <button type="button" wire:click="save({{ $id }})" wire:confirm="Are you sure you want to save the changes?">Save article</button>
</div>