<?php

namespace Codedor\SocialMediaLinks\Views\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Link extends Component
{
    public function __construct(
        public string $label,
        public string $category,
        public bool $showIcon = false,
        public ?string $href = null,
        public ?string $iconClass = null,
    ) {
    }

    public function render()
    {
        if (! $this->href) {
            return null;
        }

        return $this->view('filament-social-media-links::components.link');
    }
}
