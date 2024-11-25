# AlpineCustomSelect

Custom select built for Laravel Livewire and Alpine.

## Features

- Custom CSS classes to every element
- Options can contain anything, as icons or blade and livewire components.

## Installation

1. Place _custom-select_ and custom-select-option in _resources/views/components_

2. Place _customSelect.js_ in _resources/js/alpine_

3. Include _resources/js/alpine_ folder in _vite.config.js_ or install _glob_ (npm install glob -d) to import the whole folder. (check _examples/vite.config.js_ for reference)

## Usage

The CSS classes contained in the blade files are styled based on jetstream starter kit. Change them to match your website look.

Put all the <x-custom-select-option value="" label=""> elements into <x-custom-select> as a standard html select.

You can specify the placeholder value to use as label for the null value by using the _placeholder_ attribute.
If the placeholder is missing, the null option won't be rendered.

Any attribute is inherited by the root element.

## Examples

Check the _examples_ folder in this repository

## Accessibility

https://www.freecodecamp.org/news/how-to-build-an-accessible-custom-dropdown-select-element/

### todo

- Entering alphanumeric keys when the dropdown is open highlights the option that matches the entered letters. If there's no match, nothing changes.
- When the select element is focused when using a screen reader, the screen reader announces that it's a select element and provides information about the currently selected value for accessibility.
