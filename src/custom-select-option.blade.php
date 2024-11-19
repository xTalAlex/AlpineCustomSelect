@props(['value', 'label'])

<li tabindex="0" data-label="{{ $label }}"
    {{ $attributes->merge(['class' => 'cursor-pointer px-4 py-2 transition duration-300 ease-in-out hover:bg-indigo-500 focus:bg-indigo-500']) }}
    x-bind:class="{ 'bg-indigo-500': value == '{{ $value }}' }"
    x-on:click="setValue('{{ $value }}','{{ $label }}')" value="{{ $value }}"
    x-on:keyup.enter.stop="setValue('{{ $value }}','{{ $label }}')" x-on:keydown.enter.stop
    x-on:keydown.down.prevent="document.activeElement.nextElementSibling && document.activeElement.nextElementSibling.focus()"
    x-on:keydown.up.prevent="document.activeElement.previousElementSibling && document.activeElement.previousElementSibling.focus()">
    @if ($slot->isEmpty())
        {{ $label }}
    @else
        {{ $slot }}
    @endif
</li>
