<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Monarobase\CountryList\CountryListFacade;

class CountrySelect extends Component
{
    public $countries;

    public bool $detectLang;

    public function __construct(?bool $detectLang = false)
    {
        $this->countries = collect(CountryListFacade::getList('en', 'php'))->sort();
        $this->detectLang = $detectLang;
    }

    public function render(): View|Closure|string
    {
        return view('components.country-select');
    }
}
