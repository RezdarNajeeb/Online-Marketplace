<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public string $title;
    public string $name;
    public string $type;
    public string $value;
    public string $placeholder;
    public string $options;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $name, $type, $value = '', $placeholder = '', $options = '')
    {
        $this->title = $title;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
