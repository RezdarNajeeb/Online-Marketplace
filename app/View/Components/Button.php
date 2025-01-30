<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public string $variant;
    public string $size;
    public bool $loading;
    public ?string $icon;
    public string $iconPosition;
    public bool $block;
    public bool $outline;

    public function __construct(
        string $variant = 'primary',
        string $size = 'md',
        bool $loading = false,
        ?string $icon = null,
        string $iconPosition = 'left',
        bool $block = false,
        bool $outline = false
    ) {
        $this->variant = $variant;
        $this->size = $size;
        $this->loading = $loading;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->block = $block;
        $this->outline = $outline;
    }

    public function render()
    {
        return view('components.button');
    }
}
