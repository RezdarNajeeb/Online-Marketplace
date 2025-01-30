<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $icon;
    public bool $dismissible;
    public ?int $duration;

    public function __construct(
        string $type = 'info',
        bool $dismissible = false,
        ?int $duration = null
    ) {
        $this->type = $type;
        $this->dismissible = $dismissible;
        $this->duration = $duration;
        $this->icon = $this->getIcon();
    }

    protected function getIcon(): string
    {
        return match($this->type) {
            'success' => 'fa-check-circle',
            'error' => 'fa-exclamation-circle',
            'warning' => 'fa-exclamation-triangle',
            default => 'fa-info-circle',
        };
    }

    public function render()
    {
        return view('components.alert');
    }
}
