<div
    x-data="{
        splide: null,
        init() {
            this.splide = new Splide(this.$refs.carousel, {
                type: '{{ $type }}',
                perPage: {{ $perPage }},
                perMove: {{ $perMove }},
                gap: '{{ $gap }}',
                autoplay: {{ $autoplay ? 'true' : 'false' }},
                interval: {{ $interval }},
                pauseOnHover: {{ $pauseOnHover ? 'true' : 'false' }},
                pagination: {{ $pagination ? 'true' : 'false' }},
                arrows: {{ $arrows ? 'true' : 'false' }},
                drag: {{ $drag ? 'true' : 'false' }},
                rewind: {{ $rewind ? 'true' : 'false' }},
                @if($height)
                height: {{ $height }},
                @endif
                @if($width)
                width: '{{ $width }}',
                @endif
            }).mount()
        },
        destroy() {
            if (this.splide) {
                this.splide.destroy()
            }
        }
    }"
    wire:ignore
    class="ld-carousel"
>
    <div x-ref="carousel" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($slides as $slide)
                    <li class="splide__slide">
                        @if(isset($slide['image']))
                            <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] ?? $slide['title'] ?? '' }}" class="w-full h-full object-cover">
                            @if(isset($slide['title']) || isset($slide['description']))
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 text-white">
                                    @if(isset($slide['title']))
                                        <h3 class="text-lg font-semibold">{{ $slide['title'] }}</h3>
                                    @endif
                                    @if(isset($slide['description']))
                                        <p class="text-sm opacity-90">{{ $slide['description'] }}</p>
                                    @endif
                                </div>
                            @endif
                        @elseif(isset($slide['html']))
                            {!! $slide['html'] !!}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@assets
    <link rel="stylesheet" href="{{ config('ld-carousel.splide_css_url') }}">
    <script src="{{ config('ld-carousel.splide_js_url') }}"></script>
@endassets
