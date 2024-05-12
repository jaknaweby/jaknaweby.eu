<div>
    <x-secondary-button wire:click="addToList" class="!bg-orange-500 hover:!bg-orange-600 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
        Add {{ $current_component->name }}
    </x-secondary-button>

    <select name="cars" id="cars" wire:model.live="current_component.name" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 w-auto pr-10">
        <option value="Paragraph">Paragraph</option>
        <option value="Ordered item">Ordered item</option>
        <option value="Unordered item">Unordered item</option>
    </select>

    @foreach ($current_component->items as $key => $value)
        <div class="mt-5" class="flex">
            @include('toolbox', ['id' => "$parent_path.$current_component->name.$key"])
            <x-input-label for="{{ $parent_path }}.{{ $current_component->name }}.{{ $key }}" value="{{ ucfirst($current_component->name) }} {{ $key }}" class="mt-2" />
            <div id="{{ $parent_path }}.{{ $current_component->name }}.{{ $key }}" contenteditable="true" onkeydown="log(event, '{{ $parent_path }}.{{ $current_component->name }}.{{ $key }}')" class="mt-1 block w-full border-gray-300 border py-2 px-3 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{!! $current_component->items->{$key} !!}</div>

            <x-secondary-button onclick="log(event, '{{ $parent_path }}.{{ $current_component->name }}.{{ $key }}')" class="mt-2 !bg-gray-600 hover:!bg-gray-700 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                Update
            </x-secondary-button>

            <x-secondary-button wire:click="removeFromList({{ $key }})" class="mt-2 !bg-red-800 hover:!bg-red-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                Remove
            </x-secondary-button>

            @if ($key != 1)
                <x-secondary-button wire:click="swapItems({{ $key }}, {{ $key - 1 }})" class="mt-2 !bg-gray-800 hover:!bg-gray-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                    Move up
                </x-secondary-button>
            @else
                <x-secondary-button disabled class="mt-2 !bg-gray-800 hover:!bg-gray-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                    Move up
                </x-secondary-button>
            @endif

            @if ($key != $current_component->id)
                <x-secondary-button wire:click="swapItems({{ $key }}, {{ $key + 1 }})" class="mt-2 !bg-gray-800 hover:!bg-gray-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                    Move down
                </x-secondary-button>
            @else
                <x-secondary-button disabled class="mt-2 !bg-gray-800 hover:!bg-gray-900 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
                    Move down
                </x-secondary-button>
            @endif
        </div>
    @endforeach

    <script>
        function log(event, id) {
            if (event.key == 'Enter' || event.type == 'click') {
                Livewire.dispatch(`updateProperty.${id.split('.')[0]}`, { id: id.split('.')[2], content: document.getElementById(id).innerHTML });
            }
        }
    </script>

    {{-- <pre>
        {{ print_r($current_component) }}
    </pre> --}}
</div>