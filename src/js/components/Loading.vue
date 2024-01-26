<template>
  <section class="c-section c-section--loading">
    <div class="c-loading">
      <div class="grid-container width-100">
        <figure class="c-loading__title">
          <v-lazy-image class="width-100" :src="asset('images/loading-title.png')" />
        </figure>
        <figure class="c-loading__gif">
          <v-lazy-image class="width-100" :src="asset('images/loading-gif.gif')" />
        </figure>
        <div class="c-loading__text margin-bottom-3">
          Estamos buscando el regalo para <span class="pri-color w-bold">{{ raffle.playerFriend.fullname.value }}</span>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";

export default{
  components: {
    VLazyImage,
  },
  props: ['raffle'],
}
</script>

