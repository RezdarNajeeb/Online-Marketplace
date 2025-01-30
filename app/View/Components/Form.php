<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public string $method;
    public bool $hasFiles;
    public bool $preventMultipleSubmit;

    public function __construct(
        string $method = 'POST',
        bool $hasFiles = false,
        bool $preventMultipleSubmit = true,
    ) {
        $this->method = strtoupper($method);
        $this->hasFiles = $hasFiles;
        $this->preventMultipleSubmit = $preventMultipleSubmit;
    }

    public function render()
    {
        return view('components.form');
    }
}
