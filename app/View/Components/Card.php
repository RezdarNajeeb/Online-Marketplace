<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $header;
    public $footer;
    public bool $loading;
    public bool $collapsible;

    public function __construct(
        $header = null,
        $footer = null,
        bool $loading = false,
        bool $collapsible = false
    ) {
        $this->header = $header;
        $this->footer = $footer;
        $this->loading = $loading;
        $this->collapsible = $collapsible;
    }

    public function render()
    {
        return view('components.card');
    }
}

