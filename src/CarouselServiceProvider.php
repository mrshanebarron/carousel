<?php

namespace MrShaneBarron\Carousel;

use Illuminate\Support\ServiceProvider;

class CarouselServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-carousel', Livewire\Carousel::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-carousel');
    }
}
