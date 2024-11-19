@props(['detectLang' => false])

<x-custom-select {{ $attributes }} placeholder="-" x-init="userLang = navigator.language || navigator.userLanguage;
if ({{ json_encode($detectLang) }}) {
    value = userLang?.split('-')[userLang?.split('-').length - 1].toUpperCase() ?? null;
    $dispatch('input', value)
}">
    @foreach ($countries as $value => $label)
        <x-custom-select-option value="{{ $value }}" label="{{ $label }}">
            <div class="flex items-center justify-between">
                <div>{{ $label }}</div>
                <x-icon class="size-6" name='flag-country-{{ Str::lower($value) }}' />
            </div>
        </x-custom-select-option>
    @endforeach
</x-custom-select>
