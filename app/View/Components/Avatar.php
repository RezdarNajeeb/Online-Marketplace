<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public string $size;
    public ?string $src;
    public string $alt;
    public ?string $status;
    public ?string $initials;

    public function __construct(
        string $size = 'md',
        ?string $src = null,
        string $alt = '',
        ?string $status = null,
        ?string $initials = null
    ) {
        $this->size = $size;
        $this->src = $src;
        $this->alt = $alt;
        $this->status = $status;
        $this->initials = $initials ?? $this->generateInitials($alt);
    }

    protected function generateInitials(string $name): string
    {
        $words = explode(' ', trim($name));
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
            if (strlen($initials) >= 2) break;
        }

        return $initials;
    }

    public function render()
    {
        return view('components.avatar');
    }
}
