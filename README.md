# Carousel

A responsive image/content carousel component for Laravel applications. Supports auto-play, navigation, and indicators. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/carousel
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-carousel :slides="[
    ['image' => '/images/slide1.jpg', 'title' => 'Slide 1'],
    ['image' => '/images/slide2.jpg', 'title' => 'Slide 2'],
    ['image' => '/images/slide3.jpg', 'title' => 'Slide 3']
]" />
```

### Auto-play

```blade
<livewire:sb-carousel :slides="$slides" :autoplay="true" :interval="5000" />
```

### With Navigation

```blade
<livewire:sb-carousel
    :slides="$slides"
    :show-arrows="true"
    :show-indicators="true"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `slides` | array | required | Array of slide objects |
| `autoplay` | boolean | `false` | Auto-advance slides |
| `interval` | number | `3000` | Autoplay interval (ms) |
| `show-arrows` | boolean | `true` | Show prev/next arrows |
| `show-indicators` | boolean | `true` | Show dot indicators |

## Vue 3 Usage

### Setup

```javascript
import { SbCarousel } from './vendor/sb-carousel';
app.component('SbCarousel', SbCarousel);
```

### Basic Usage

```vue
<template>
  <SbCarousel :slides="slides" />
</template>

<script setup>
const slides = [
  { image: '/images/slide1.jpg', title: 'First Slide' },
  { image: '/images/slide2.jpg', title: 'Second Slide' },
  { image: '/images/slide3.jpg', title: 'Third Slide' }
];
</script>
```

### With Auto-play

```vue
<template>
  <SbCarousel
    :slides="slides"
    autoplay
    :interval="4000"
  />
</template>
```

### Custom Slides via Slot

```vue
<template>
  <SbCarousel :slide-count="products.length">
    <template #slide="{ index }">
      <div class="p-8 text-center">
        <img :src="products[index].image" class="mx-auto" />
        <h3 class="text-xl font-bold mt-4">{{ products[index].name }}</h3>
        <p class="text-gray-600">{{ products[index].price }}</p>
      </div>
    </template>
  </SbCarousel>
</template>
```

### Hero Carousel

```vue
<template>
  <SbCarousel :slides="heroSlides" class="h-96" autoplay>
    <template #slide="{ slide }">
      <div
        class="h-full bg-cover bg-center flex items-center justify-center"
        :style="{ backgroundImage: `url(${slide.image})` }"
      >
        <div class="text-center text-white">
          <h2 class="text-4xl font-bold">{{ slide.title }}</h2>
          <p class="mt-2">{{ slide.description }}</p>
        </div>
      </div>
    </template>
  </SbCarousel>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `slides` | Array | `[]` | Slide data array |
| `autoplay` | Boolean | `false` | Auto-advance |
| `interval` | Number | `3000` | Autoplay interval |
| `showArrows` | Boolean | `true` | Navigation arrows |
| `showIndicators` | Boolean | `true` | Dot indicators |
| `slideCount` | Number | - | For slot-based slides |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `change` | `index` | Slide changed |

### Slots

| Slot | Props | Description |
|------|-------|-------------|
| `slide` | `{ slide, index }` | Custom slide content |

## Slide Object

```javascript
{
  image: '/path/to/image.jpg',  // Image URL
  title: 'Slide Title',          // Optional title
  description: 'Description',    // Optional description
  link: '/page'                  // Optional link
}
```

## Features

- **Auto-play**: Automatic slide advancement
- **Navigation**: Previous/next arrows
- **Indicators**: Clickable dot navigation
- **Touch Support**: Swipe on mobile
- **Keyboard**: Arrow key navigation
- **Responsive**: Full-width responsive

## Styling

Uses Tailwind CSS:
- Full-width container
- Centered arrows
- Bottom indicators
- Smooth transitions

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
