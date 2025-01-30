<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public ?string $label;
    public bool $disabled;
    public string $name;
    public string $type;
    public ?string $value;
    public ?string $icon;
    public ?string $prefix;
    public ?string $suffix;
    public ?int $maxLength;
    public bool $showCount;

    public function __construct(
        ?string $label = null,
        bool $disabled = false,
        string $name = 'input',
        string $type = 'text',
        ?string $value = null,
        ?string $icon = null,
        ?string $prefix = null,
        ?string $suffix = null,
        ?int $maxLength = null,
        bool $showCount = false
    ) {
        $this->label = $label;
        $this->disabled = $disabled;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->icon = $icon;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->maxLength = $maxLength;
        $this->showCount = $showCount;
    }

    public function render()
    {
        return view('components.input');
    }
}
