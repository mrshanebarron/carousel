<div class="relative overflow-hidden rounded-lg" @if($autoplay) wire:poll.{{ $interval }}ms="next" @endif>
    <div class="relative h-64 md:h-96">
        @foreach($slides as $index => $slide)
            <div class="absolute inset-0 transition-opacity duration-500 {{ $current === $index ? 'opacity-100' : 'opacity-0 pointer-events-none' }}">
                <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] ?? '' }}" class="w-full h-full object-cover">
                @if(isset($slide['caption']))
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                        <p class="text-white text-lg font-medium">{{ $slide['caption'] }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @if($showArrows && count($slides) > 1)
        <button wire:click="previous" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white shadow-lg">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button wire:click="next" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white shadow-lg">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
    @endif

    @if($showDots && count($slides) > 1)
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
            @foreach($slides as $index => $slide)
                <button wire:click="goTo({{ $index }})" class="w-2.5 h-2.5 rounded-full transition-colors {{ $current === $index ? 'bg-white' : 'bg-white/50 hover:bg-white/75' }}"></button>
            @endforeach
        </div>
    @endif
</div>
