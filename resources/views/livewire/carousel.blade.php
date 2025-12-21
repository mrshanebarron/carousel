<div style="position: relative; overflow: hidden; border-radius: 8px;" @if($this->autoplay) wire:poll.{{ $this->interval }}ms="next" @endif>
    <div style="position: relative; height: 256px;">
        @foreach($this->slides as $index => $slide)
            <div style="position: absolute; inset: 0; transition: opacity 0.5s; {{ $this->current === $index ? 'opacity: 1;' : 'opacity: 0; pointer-events: none;' }}">
                <img src="{{ $slide['image'] }}" alt="{{ $slide['alt'] ?? '' }}" style="width: 100%; height: 100%; object-fit: cover;">
                @if(isset($slide['caption']))
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); padding: 16px;">
                        <p style="color: white; font-size: 18px; font-weight: 500; margin: 0;">{{ $slide['caption'] }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    @if($this->showArrows && count($this->slides) > 1)
        <button wire:click="previous" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: rgba(255,255,255,0.8); border: none; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" onmouseover="this.style.background='white'" onmouseout="this.style.background='rgba(255,255,255,0.8)'">
            <svg style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button wire:click="next" style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: rgba(255,255,255,0.8); border: none; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1);" onmouseover="this.style.background='white'" onmouseout="this.style.background='rgba(255,255,255,0.8)'">
            <svg style="width: 20px; height: 20px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
    @endif

    @if($this->showDots && count($this->slides) > 1)
        <div style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); display: flex; gap: 8px;">
            @foreach($this->slides as $index => $slide)
                <button wire:click="goTo({{ $index }})" style="width: 10px; height: 10px; border-radius: 50%; border: none; cursor: pointer; transition: background 0.15s; {{ $this->current === $index ? 'background: white;' : 'background: rgba(255,255,255,0.5);' }}" onmouseover="this.style.background='{{ $this->current === $index ? 'white' : 'rgba(255,255,255,0.75)' }}'" onmouseout="this.style.background='{{ $this->current === $index ? 'white' : 'rgba(255,255,255,0.5)' }}'"></button>
            @endforeach
        </div>
    @endif
</div>
