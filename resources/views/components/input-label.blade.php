@props(['value'])


<label {{ $attributes->merge(['class' => 'block font-medium text-sm']) }}>
    {{ $value }}
</label>
