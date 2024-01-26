<template>
  <section class="c-section c-section--tarjeta">
    <div class="c-tarjeta">
      <div class="grid-container">
        <h2 class="c-tarjeta__title pri-color text-center">Tarjeta Navideña Personalizada</h2>
        <p class="c-tarjeta__text text-center flex-container align-center-middle">
          Desde aquí puede imprimir esta tarjeta personalizada.

          <button @click="print()">
            <v-lazy-image :src="asset('images/imp-icon.png')" />
          </button>
        </p>
        <figure id="card" class="c-tarjeta__figure position-relative">
          <v-lazy-image class="width-100" :src="asset('images/bg-tarjeta.png')" />
          <figcaption class="c-tarjeta__figcaption  position-absolute">{{ raffle.player.firstname.value }} {{ raffle.player.lastname.value }}</figcaption>
          <figcaption class="c-tarjeta__figcaption c-tarjeta__figcaption--bottom position-absolute">{{ raffle.playerFriend.fullname.value }}</figcaption>
        </figure>
        <p class="c-tarjeta__subtitle text-center">
          Si quieres encontrar <strong>el regalo perfecto</strong>, haz click en el enlace:
        </p>

        <a class="c-tarjeta__link pri-color" href="www.lg.com/pe/descubreturegaloperfecto">www.lg.com/pe/descubreturegaloperfecto</a>
      </div>
    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import html2canvas from 'html2canvas';

export default{
  components: {
    VLazyImage,
  },
  props: ['raffle'],
  methods: {
    print: function() {
      html2canvas(document.querySelector("#card")).then(canvas => {
        let a = document.createElement('a');

        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        a.download = 'lg-regalo-perfecto.jpg';
        a.click();
      });
    },
  },
}
</script>
