<template>
  <div class="relative overflow-hidden rounded-lg">
    <div class="relative h-64 md:h-96">
      <div v-for="(slide, index) in slides" :key="index" :class="['absolute inset-0 transition-opacity duration-500', current === index ? 'opacity-100' : 'opacity-0 pointer-events-none']">
        <img :src="slide.image" :alt="slide.alt || ''" class="w-full h-full object-cover">
        <div v-if="slide.caption" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
          <p class="text-white text-lg font-medium">{{ slide.caption }}</p>
        </div>
      </div>
    </div>

    <template v-if="showArrows && slides.length > 1">
      <button @click="previous" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white shadow-lg">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
      </button>
      <button @click="next" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 hover:bg-white shadow-lg">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
      </button>
    </template>

    <div v-if="showDots && slides.length > 1" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
      <button v-for="(_, index) in slides" :key="index" @click="current = index" :class="['w-2.5 h-2.5 rounded-full transition-colors', current === index ? 'bg-white' : 'bg-white/50 hover:bg-white/75']"></button>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue';

export default {
  name: 'LdCarousel',
  props: {
    slides: { type: Array, required: true },
    autoplay: { type: Boolean, default: false },
    interval: { type: Number, default: 5000 },
    showArrows: { type: Boolean, default: true },
    showDots: { type: Boolean, default: true }
  },
  setup(props) {
    const current = ref(0);
    let timer = null;

    const previous = () => { current.value = current.value === 0 ? props.slides.length - 1 : current.value - 1; };
    const next = () => { current.value = current.value === props.slides.length - 1 ? 0 : current.value + 1; };

    onMounted(() => { if (props.autoplay) timer = setInterval(next, props.interval); });
    onUnmounted(() => { if (timer) clearInterval(timer); });

    return { current, previous, next };
  }
};
</script>
