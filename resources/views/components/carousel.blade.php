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
        },
        go(index) {
            if (this.splide) {
                this.splide.go(index)
            }
        },
        next() {
            if (this.splide) {
                this.splide.go('>')
            }
        },
        prev() {
            if (this.splide) {
                this.splide.go('<')
            }
        }
    }"
    class="ld-carousel"
>
    <div x-ref="carousel" id="{{ $carouselId }}" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                {{ $slot }}
            </ul>
        </div>
    </div>
</div>

@once
    @push('styles')
        <link rel="stylesheet" href="{{ config('ld-carousel.splide_css_url') }}">
    @endpush
    @push('scripts')
        <script src="{{ config('ld-carousel.splide_js_url') }}"></script>
    @endpush
@endonce
