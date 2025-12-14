<?php

namespace MrShaneBarron\Carousel\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carousel extends Component
{
    public string $carouselId;

    public function __construct(
        public string $type = 'loop',
        public int $perPage = 1,
        public int $perMove = 1,
        public string $gap = '1rem',
        public bool $autoplay = false,
        public int $interval = 5000,
        public bool $pauseOnHover = true,
        public bool $pagination = true,
        public bool $arrows = true,
        public bool $drag = true,
        public bool $rewind = true,
        public ?int $height = null,
        public ?string $width = null,
        ?string $id = null
    ) {
        $this->carouselId = $id ?? 'carousel-' . uniqid();
    }

    public function render(): View
    {
        return view('ld-carousel::components.carousel');
    }
}
