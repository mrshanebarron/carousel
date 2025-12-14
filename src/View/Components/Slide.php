<?php

namespace MrShaneBarron\Carousel\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slide extends Component
{
    public function __construct(
        public ?string $image = null,
        public ?string $alt = null,
        public ?string $title = null,
        public ?string $description = null
    ) {}

    public function render(): View
    {
        return view('ld-carousel::components.slide');
    }
}
