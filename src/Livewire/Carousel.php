<?php

namespace MrShaneBarron\Carousel\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public array $slides = [];
    public int $current = 0;
    public bool $autoplay = false;
    public int $interval = 5000;
    public bool $showArrows = true;
    public bool $showDots = true;

    public function mount(array $slides = [], bool $autoplay = false, int $interval = 5000, bool $showArrows = true, bool $showDots = true): void
    {
        $this->slides = $slides;
        $this->autoplay = $autoplay;
        $this->interval = $interval;
        $this->showArrows = $showArrows;
        $this->showDots = $showDots;
    }

    public function previous(): void
    {
        $this->current = $this->current === 0 ? count($this->slides) - 1 : $this->current - 1;
    }

    public function next(): void
    {
        $this->current = $this->current === count($this->slides) - 1 ? 0 : $this->current + 1;
    }

    public function goTo(int $index): void
    {
        $this->current = $index;
    }

    public function render()
    {
        return view('sb-carousel::livewire.carousel');
    }
}
