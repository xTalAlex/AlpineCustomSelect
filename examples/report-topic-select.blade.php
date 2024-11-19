<x-custom-select {{ $attributes }} placeholder="Select a topic">
    @foreach ($options as $value => $label)
        <x-custom-select-option value="{{ $value }}" label="{{ $label }}" />
    @endforeach
</x-custom-select>
