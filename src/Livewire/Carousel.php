<?php

namespace MrShaneBarron\Carousel\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public array $slides = [];
    public string $type = 'loop';
    public int $perPage = 1;
    public int $perMove = 1;
    public string $gap = '1rem';
    public bool $autoplay = false;
    public int $interval = 5000;
    public bool $pauseOnHover = true;
    public bool $pagination = true;
    public bool $arrows = true;
    public bool $drag = true;
    public bool $rewind = true;
    public ?int $height = null;
    public ?string $width = null;

    public function mount(
        array $slides = [],
        ?string $type = null,
        ?int $perPage = null,
        ?int $perMove = null,
        ?string $gap = null,
        ?bool $autoplay = null,
        ?int $interval = null,
        ?bool $pauseOnHover = null,
        ?bool $pagination = null,
        ?bool $arrows = null,
        ?bool $drag = null,
        ?bool $rewind = null,
        ?int $height = null,
        ?string $width = null
    ): void {
        $this->slides = $slides;
        $this->type = $type ?? config('ld-carousel.type', 'loop');
        $this->perPage = $perPage ?? config('ld-carousel.perPage', 1);
        $this->perMove = $perMove ?? config('ld-carousel.perMove', 1);
        $this->gap = $gap ?? config('ld-carousel.gap', '1rem');
        $this->autoplay = $autoplay ?? config('ld-carousel.autoplay', false);
        $this->interval = $interval ?? config('ld-carousel.interval', 5000);
        $this->pauseOnHover = $pauseOnHover ?? config('ld-carousel.pauseOnHover', true);
        $this->pagination = $pagination ?? config('ld-carousel.pagination', true);
        $this->arrows = $arrows ?? config('ld-carousel.arrows', true);
        $this->drag = $drag ?? config('ld-carousel.drag', true);
        $this->rewind = $rewind ?? config('ld-carousel.rewind', true);
        $this->height = $height;
        $this->width = $width;
    }

    public function render()
    {
        return view('ld-carousel::livewire.carousel');
    }
}
