<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public string $type;
    public string $size;
    public bool $dot;
    public bool $counter;
    public ?int $max;

    public function __construct(
        string $type = 'default',
        string $size = 'md',
        bool $dot = false,
        bool $counter = false,
        ?int $max = 99
    ) {
        $this->type = $type;
        $this->size = $size;
        $this->dot = $dot;
        $this->counter = $counter;
        $this->max = $max;
    }

    public function render()
    {
        return view('components.badge');
    }
}
