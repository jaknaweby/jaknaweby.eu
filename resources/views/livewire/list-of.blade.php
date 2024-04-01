<div>
    <x-secondary-button wire:click="addToList" class="!bg-orange-500 hover:!bg-orange-600 !text-white border-0 focus:!ring-0 focus:!ring-offset-0">
        Add {{ $name }}
    </x-secondary-button>

    @foreach ($current_component->items as $key => $value)
        <div class="mt-5" class="flex">
            <x-input-label for="text.{{ $key }}" value="{{ ucfirst($name) }} {{ $key }}" />
            {{-- <x-text-input type="text" id="text.{{ $key }}" wire:model.live="current_component.items.{{ $key }}" class="block mt-1 w-full" type="text" name="text" /> --}}
            <textarea rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model.live="current_component.items.{{ $key }}"></textarea>

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
</div>
