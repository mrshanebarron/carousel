# Laravel Design Carousel

Carousel/slider component using Splide for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/carousel
```

For Vue components:
```bash
npm install @laraveldesign/carousel
```

Include Splide CSS and JS:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>
```

## Usage

### Livewire Component

```blade
<livewire:ld-carousel :slides="[
    ['image' => '/images/slide1.jpg', 'title' => 'Slide 1'],
    ['image' => '/images/slide2.jpg', 'title' => 'Slide 2'],
    ['image' => '/images/slide3.jpg', 'title' => 'Slide 3'],
]" />

{{-- With options --}}
<livewire:ld-carousel
    :slides="$slides"
    type="loop"
    :per-page="3"
    gap="1rem"
    :autoplay="true"
    :interval="3000"
/>

{{-- Without pagination/arrows --}}
<livewire:ld-carousel
    :slides="$testimonials"
    :pagination="false"
    :arrows="false"
    :autoplay="true"
/>
```

### Blade Component

```blade
<x-ld-carousel>
    <x-ld-slide>
        <img src="/images/hero1.jpg" alt="Hero 1">
    </x-ld-slide>
    <x-ld-slide>
        <img src="/images/hero2.jpg" alt="Hero 2">
    </x-ld-slide>
    <x-ld-slide>
        <img src="/images/hero3.jpg" alt="Hero 3">
    </x-ld-slide>
</x-ld-carousel>

{{-- Product carousel --}}
<x-ld-carousel :per-page="4" gap="1.5rem" :rewind="true">
    @foreach($products as $product)
        <x-ld-slide>
            <div class="product-card">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>${{ $product->price }}</p>
            </div>
        </x-ld-slide>
    @endforeach
</x-ld-carousel>
```

### Vue 3 Component

```vue
<script setup>
import { LdCarousel, LdSlide } from '@laraveldesign/carousel'

const slides = [
  { image: '/img/1.jpg', title: 'First' },
  { image: '/img/2.jpg', title: 'Second' },
  { image: '/img/3.jpg', title: 'Third' },
]
</script>

<template>
  <LdCarousel
    :slides="slides"
    :per-page="1"
    :autoplay="true"
    :interval="5000"
    @moved="handleMoved"
  >
    <template #slide="{ slide }">
      <img :src="slide.image" :alt="slide.title" />
      <h3>{{ slide.title }}</h3>
    </template>
  </LdCarousel>
</template>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `slides` | array | `[]` | Array of slide data |
| `type` | string | `'loop'` | Carousel type: `loop`, `slide`, `fade` |
| `perPage` | number | `1` | Slides visible per page |
| `perMove` | number | `1` | Slides to move per navigation |
| `gap` | string | `'1rem'` | Gap between slides |
| `autoplay` | boolean | `false` | Enable autoplay |
| `interval` | number | `5000` | Autoplay interval (ms) |
| `pauseOnHover` | boolean | `true` | Pause autoplay on hover |
| `pagination` | boolean | `true` | Show pagination dots |
| `arrows` | boolean | `true` | Show navigation arrows |
| `drag` | boolean | `true` | Enable drag/swipe |
| `rewind` | boolean | `true` | Rewind to start after last slide |
| `height` | number | `null` | Fixed height in pixels |
| `width` | string | `null` | Custom width |

## Responsive Breakpoints

Configure different options per breakpoint:

```blade
<livewire:ld-carousel
    :slides="$slides"
    :per-page="4"
    :breakpoints="[
        768 => ['perPage' => 2],
        480 => ['perPage' => 1],
    ]"
/>
```

## Events

### Livewire Events

```javascript
Livewire.on('carousel-moved', ({ index }) => {
    console.log('Current slide:', index);
});
```

### Vue Events

```vue
<LdCarousel
  @moved="handleMoved"
  @mounted="handleMounted"
  @destroy="handleDestroy"
/>
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-carousel-config
```

### Configuration Options

```php
// config/ld-carousel.php
return [
    'type' => 'loop',
    'perPage' => 1,
    'perMove' => 1,
    'gap' => '1rem',
    'autoplay' => false,
    'interval' => 5000,
    'pauseOnHover' => true,
    'pagination' => true,
    'arrows' => true,
    'drag' => true,
    'rewind' => true,
];
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-carousel-views
```

### Custom Arrows

Override arrow icons by publishing views:

```blade
{{-- resources/views/vendor/ld-carousel/components/carousel.blade.php --}}
<div class="splide__arrows">
    <button class="splide__arrow splide__arrow--prev">
        <x-heroicon-o-chevron-left class="w-6 h-6" />
    </button>
    <button class="splide__arrow splide__arrow--next">
        <x-heroicon-o-chevron-right class="w-6 h-6" />
    </button>
</div>
```

### Splide Themes

Use Splide's built-in themes:

```html
<!-- Default theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">

<!-- Sea Green theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/themes/splide-sea-green.min.css">
```

## License

MIT
