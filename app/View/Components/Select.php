<?php

namespace App\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
    public $options;
    public $selected;
    public $placeholder;
    public $disabled;
    public $groupBy;

    public function __construct(
        $options = [],
        $selected = null,
        string $placeholder = null,
        bool $disabled = false,
        string $groupBy = null
    ) {
        $this->options = $this->formatOptions($options);
        $this->selected = $selected;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled;
        $this->groupBy = $groupBy;
    }

    protected function formatOptions($options): Collection
    {
        if ($options instanceof Collection) {
            return $options;
        }

        if (is_array($options)) {
            return collect($options);
        }

        return collect([]);
    }

    public function render(): View
    {
        return view('components.select');
    }
}
