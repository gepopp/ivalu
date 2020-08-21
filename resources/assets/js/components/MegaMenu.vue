<template>
  <div class="relative">
    <a href="#" class="px-3" @click="toogleMegaMenu">Projektentwickler</a>
    <transition name="fade">
      <div class="absolute w-auto bg-white rounded-lg text-gray-600 p-5 mt-3" style="min-width: 450px" v-if="show">
        <slot></slot>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  name: "MegaMenu",
  props: ['id'],
  data() {
    return {
      show: false
    }
  },
  methods:{
    toogleMegaMenu(){
      this.show = !this.show;
    }
  },
  mounted() {
    events.$on('toogleMegaMenu', (id) => {
      if (id = this.id) {
        this.show = !this.show;
      }
    })
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>