<li class="splide__slide">
    @if($image)
        <img src="{{ $image }}" alt="{{ $alt ?? $title ?? '' }}" class="w-full h-full object-cover">
        @if($title || $description)
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 text-white">
                @if($title)
                    <h3 class="text-lg font-semibold">{{ $title }}</h3>
                @endif
                @if($description)
                    <p class="text-sm opacity-90">{{ $description }}</p>
                @endif
            </div>
        @endif
    @else
        {{ $slot }}
    @endif
</li>
