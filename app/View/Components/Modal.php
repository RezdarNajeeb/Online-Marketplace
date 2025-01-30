<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Modal extends Component
{
    public $id;
    public $maxWidth;
    public $title;
    public $showClose;

    public function __construct(
        string $id,
        string $maxWidth = '2xl',
        string $title = '',
        bool $showClose = true
    ) {
        $this->id = $id;
        $this->maxWidth = $this->getMaxWidth($maxWidth);
        $this->title = $title;
        $this->showClose = $showClose;
    }

    protected function getMaxWidth(string $maxWidth): string
    {
        return [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
        ][$maxWidth] ?? 'sm:max-w-2xl';
    }

    public function render(): View
    {
        return view('components.modal');
    }
}
