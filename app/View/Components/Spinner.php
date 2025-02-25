<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Spinner extends Component
{
    public string $size;
    public string $color;
    /**
     * Create a new component instance.
     */
    public function __construct(string $size = 'md', string $color = 'indigo')
    {
        $this->size = $size;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.spinner');
    }
}
