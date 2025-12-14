<script setup lang="ts">
interface Props {
  image?: string
  alt?: string
  title?: string
  description?: string
}

const props = defineProps<Props>()
</script>

<template>
  <li class="splide__slide">
    <template v-if="image">
      <img :src="image" :alt="alt || title || ''" class="w-full h-full object-cover">
      <div v-if="title || description" class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4 text-white">
        <h3 v-if="title" class="text-lg font-semibold">{{ title }}</h3>
        <p v-if="description" class="text-sm opacity-90">{{ description }}</p>
      </div>
    </template>
    <slot v-else />
  </li>
</template>
