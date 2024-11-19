<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ReportTopicSelect extends Component
{
    public Collection $options;

    public function __construct($options)
    {
        $this->options = collect($options);
    }

    public function render(): View|Closure|string
    {
        return view('components.report-topic-select');
    }
}
