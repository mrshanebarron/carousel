<?php

namespace MrShaneBarron\Carousel;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\Carousel\View\Components\Carousel;
use MrShaneBarron\Carousel\View\Components\Slide;
use Livewire\Livewire;

class CarouselServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ld-carousel.php', 'ld-carousel');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ld-carousel');

        $this->publishes([
            __DIR__.'/../config/ld-carousel.php' => config_path('ld-carousel.php'),
        ], 'ld-carousel-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/ld-carousel'),
        ], 'ld-carousel-views');

        // Register Blade components
        $this->loadViewComponentsAs('ld', [
            Carousel::class,
            Slide::class,
        ]);

        // Register Livewire component if Livewire is installed
        if (class_exists(Livewire::class)) {
            Livewire::component('ld-carousel', \MrShaneBarron\Carousel\Livewire\Carousel::class);
        }
    }
}
