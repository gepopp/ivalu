<template>
  <div class="absolute floating flex rounded-full cursor-pointer" style=" animation-delay: .1s" :style="{top: y, left: x}" @mouseleave="enfold = false" @mouseover="enfold = true">
    <div class="rounded-full w-24 h-24 bg-white border-4 border-blue-600  flex content-center z-50" @click="enfold = !enfold">
      <slot></slot>
    </div>
    <transition name="fade">
      <div class="w-64 h-24 bg-white border-4 border-blue-600 rounded-full -ml-24 pl-24 flex content-center"
           v-if="enfold">
        <a href="#" class="my-auto underline text-sm" v-text="text"></a>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "WavingDisc",
  props: ['x', 'y', 'text', 'link'],
  data() {
    return {
      enfold: false,
    }
  },
  methods: {}
}
</script>

<style>

</style>