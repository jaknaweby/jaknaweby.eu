<div>
    <button type="button" wire:click="addToList" class="bg-slate-200 text-sm px-6 py-1.5 font-normal rounded">Add {{ $name }}</button>
    @foreach ($current_component->items as $key => $value)
        <div class="mb-1" class="flex">
            <label for="text" class="text-sm">{{ ucfirst($name) }} {{ $key }}</label><br>
            <input type="text" name="text" id="text" wire:model.live="current_component.items.{{ $key }}" class="bg-slate-100 py-1.5 text-sm px-1">
            <button type="button" wire:click="removeFromList({{ $key }})" class="bg-slate-200 text-sm px-6 py-1.5 font-normal rounded-sm">Remove</button>

            @if ($key != 1)
                <button type="button" wire:click="swapItems({{ $key }}, {{ $key - 1 }})" class="bg-slate-200 text-sm px-6 py-1.5 font-normal rounded-sm">⬆️</button>
            @endif

            @if ($key != $current_component->id)
                <button type="button" wire:click="swapItems({{ $key }}, {{ $key + 1 }})" class="bg-slate-200 text-sm px-6 py-1.5 font-normal rounded-sm">⬇️</button>
            @endif
        </div>
    @endforeach
</div>
