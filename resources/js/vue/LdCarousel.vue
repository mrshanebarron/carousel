<script setup lang="ts">
import { ref, onMounted, onUnmounted, watch, useSlots } from 'vue'
import Splide from '@splidejs/splide'
import '@splidejs/splide/dist/css/splide.min.css'

interface Slide {
  image?: string
  alt?: string
  title?: string
  description?: string
  html?: string
}

interface Props {
  slides?: Slide[]
  type?: 'slide' | 'loop' | 'fade'
  perPage?: number
  perMove?: number
  gap?: string
  autoplay?: boolean
  interval?: number
  pauseOnHover?: boolean
  pagination?: boolean
  arrows?: boolean
  drag?: boolean
  rewind?: boolean
  height?: number | string
  width?: string
}

const props = withDefaults(defineProps<Props>(), {
  slides: () => [],
  type: 'loop',
  perPage: 1,
  perMove: 1,
  gap: '1rem',
  autoplay: false,
  interval: 5000,
  pauseOnHover: true,
  pagination: true,
  arrows: true,
  drag: true,
  rewind: true,
  height: undefined,
  width: undefined,
})

const emit = defineEmits<{
  'mounted': [splide: Splide]
  'move': [newIndex: number, prevIndex: number]
  'moved': [newIndex: number, prevIndex: number]
  'click': [slide: any, event: MouseEvent]
}>()

const carouselRef = ref<HTMLElement | null>(null)
let splideInstance: Splide | null = null

const slots = useSlots()

function initSplide() {
  if (!carouselRef.value) return

  splideInstance = new Splide(carouselRef.value, {
    type: props.type,
    perPage: props.perPage,
    perMove: props.perMove,
    gap: props.gap,
    autoplay: props.autoplay,
    interval: props.interval,
    pauseOnHover: props.pauseOnHover,
    pagination: props.pagination,
    arrows: props.arrows,
    drag: props.drag,
    rewind: props.rewind,
    height: props.height,
    width: props.width,
  })

  splideInstance.on('mounted', () => {
    emit('mounted', splideInstance!)
  })

  splideInstance.on('move', (newIndex: number, prevIndex: number) => {
    emit('move', newIndex, prevIndex)
  })

  splideInstance.on('moved', (newIndex: number, prevIndex: number) => {
    emit('moved', newIndex, prevIndex)
  })

  splideInstance.on('click', (slide: any, event: MouseEvent) => {
    emit('click', slide, event)
  })

  splideInstance.mount()
}

function destroySplide() {
  if (splideInstance) {
    splideInstance.destroy()
    splideInstance = null
  }
}

function go(target: number | string) {
  splideInstance?.go(target)
}

function next() {
  splideInstance?.go('>')
}

function prev() {
  splideInstance?.go('<')
}

function refresh() {
  splideInstance?.refresh()
}

onMounted(() => {
  initSplide()
})

onUnmounted(() => {
  destroySplide()
})

watch(() => [props.perPage, props.type, props.autoplay], () => {
  destroySplide()
  initSplide()
})

defineExpose({
  splide: () => splideInstance,
  go,
  next,
  prev,
  refresh,
})
</script>

<template>
  <div class="ld-carousel">
    <div ref="carouselRef" class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <slot v-if="slots.default" />
          <template v-else>
            <li v-for="(slide, index) in slides" :key="index" class="splide__slide">
              <template v-if="slide.image">
                <img :src="slide.image" :alt="slide.alt || slide.title || ''" class="w-full h-full object-cover">
                <div v-if="slide.title || slide.description" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 text-white">
                  <h3 v-if="slide.title" class="text-lg font-semibold">{{ slide.title }}</h3>
                  <p v-if="slide.description" class="text-sm opacity-90">{{ slide.description }}</p>
                </div>
              </template>
              <div v-else-if="slide.html" v-html="slide.html"></div>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </div>
</template>
