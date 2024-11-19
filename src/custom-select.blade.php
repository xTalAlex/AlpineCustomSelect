@props(['disabled' => false, 'placeholder' => null, 'id' => null])

<div x-data="customSelect({{ json_encode([
    'placeholder' => $placeholder,
    'disabled' => $disabled,
]) }})" {{ $attributes->merge(['class' => 'relative w-full']) }} x-modelable="value"
    x-bind="container">

    <button tabindex="0" id="{{ $id }}" type="button" @class([
        'w-full py-2 px-2 bg-white text-black flex items-center justify-between',
        'transition duration-300 ease-in-out border-2 border-transparent border-b-indigo-500/20',
    ])
        x-bind:class="{
            'focus:border-transparent focus:ring-0 focus:outline-none focus:border-b-indigo-500 focus:outline-transparent':
                !disabled
        }"
        x-on:keyup.enter.prevent="" x-on:keydown.enter.prevent x-bind="button" x-ref="selectButton"
        x-bind:disabled="disabled">
        <span class="w-full overflow-hidden overflow-ellipsis pr-6 text-left" x-html="displayedText"></span>

        {{-- Arrow down icon --}}
        <div x-show="!disabled" class="size-4">
            <svg version="1.1" stroke="#000" fill="#000" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 960 560"
                enable-background="new 0 0 960 560" xml:space="preserve">
                <g id="Rounded_Rectangle_33_copy_4_1_">
                    <path d="M480,344.181L268.869,131.889c-15.756-15.859-41.3-15.859-57.054,0c-15.754,15.857-15.754,41.57,0,57.431l237.632,238.937
  c8.395,8.451,19.562,12.254,30.553,11.698c10.993,0.556,22.159-3.247,30.555-11.698l237.631-238.937
  c15.756-15.86,15.756-41.571,0-57.431s-41.299-15.859-57.051,0L480,344.181z" />
                </g>
            </svg>
        </div>
        {{-- You can use a blade icon package like <x-icon-keyboard-arrow-down-r x-show="!disabled" class="size-4" /> --}}

    </button>

    <div class="absolute z-10 mt-0 w-full rounded-b-lg border border-transparent bg-white" x-bind="dropdown"
        x-ref="selectDropdown" x-cloak>
        <ul tabindex="-1" class="max-h-64 overflow-auto rounded-b-lg text-black">
            @if ($placeholder !== null)
                <x-custom-select-option value="" label="{{ $placeholder }}" />
            @endif
            {{ $slot }}
        </ul>
    </div>

</div>

{{-- Import customSelect.js --}}
@vite(['resources/js/alpine/customSelect.js'])

{{-- You can use a stack to push scripts in your layout
    @push('bottom')
        @vite(['resources/js/alpine/customSelect.js'])
    @endpush 
--}}
