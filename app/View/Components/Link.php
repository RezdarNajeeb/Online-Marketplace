<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public ?string $href;
    public ?string $variant;
    public ?string $size;
    public ?string $icon;
    public ?string $iconPosition;
    public ?bool $disabled;
    /**
     * Create a new component instance.
     */
    public function __construct(string $href = null, string $variant = 'default', string $size = 'sm', string $icon = null, string $iconPosition = null, bool $disabled = false)
    {
        $this->href = $href;
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link');
    }
}
