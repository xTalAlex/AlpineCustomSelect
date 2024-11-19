@props(['disabled' => false, 'placeholder' => null, 'id' => null])

<div x-data="customSelect({{ json_encode([
    'placeholder' => $placeholder,
    'disabled' => $disabled,
]) }})" {{ $attributes->merge(['class' => 'relative w-full']) }} x-modelable="value"
    x-bind="container">

    <button tabindex="0" id="{{ $id }}" type="button" @class([
        'w-full py-2 px-2 bg-transparent flex items-center justify-between',
        'transition duration-300 ease-in-out border-2 border-transparent border-b-secondary-500/20',
    ])
        x-bind:class="{
            'focus:border-transparent focus:ring-0 focus:outline-none focus:border-b-secondary-500 focus:outline-transparent':
                !disabled
        }"
        x-on:keyup.enter.prevent="" x-on:keydown.enter.prevent x-bind="button" x-ref="selectButton"
        x-bind:disabled="disabled">
        <span class="w-full overflow-hidden overflow-ellipsis pr-6 text-left" x-html="displayedText"></span>
        <x-icon-keyboard-arrow-down-r x-show="!disabled" class="size-4" />
    </button>

    <div class="bg-black-800 absolute z-10 mt-2 w-full rounded-lg border border-transparent" x-bind="dropdown"
        x-ref="selectDropdown" x-cloak>
        <ul tabindex="-1" class="max-h-64 overflow-auto rounded-lg text-white">
            @if ($placeholder !== null)
                <x-custom-select-option value="" label="{{ $placeholder }}" />
            @endif
            {{ $slot }}
        </ul>
    </div>

</div>

@push('bottom')
    @vite(['resources/js/alpine/customSelect.js'])
@endpush
