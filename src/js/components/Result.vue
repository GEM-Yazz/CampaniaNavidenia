<template>
  <section class="c-section c-section--result">
    <div class="c-result">
      <div class="grid-container width-100 position-relative">
        <div class="c-result__stars position-absolute desktop">
          <v-lazy-image class="width-100" :src="asset('images/stars.png')" />
        </div>
        <div class="c-result__confeti position-absolute">
          <v-lazy-image class="width-100 desktop" :src="asset('images/confeti.png')" />
          <v-lazy-image class="width-100 mobile" :src="asset('images/confeti-m.png')" />
        </div>
        <div class="grid-x grid-margin-x grid-margin-y align-justify align-middle">
          <div class="cell large-4 c">
            <div class="c-center">
              <div class="text-center">
                <h2 class="c-center__title">{{ gift.name }}</h2>
              </div>
              <figure class="c-center__figure position-relative">
                <v-lazy-image class="width-100" :src="asset(`images/products/${gift.image}.png`)" />
                <figcaption class="c-center__figcaption desktop">
                  <v-lazy-image class="width-100" :src="asset('images/bg-regalo.png')" />
                </figcaption>
                <figcaption class="c-center__cursor">
                  <v-lazy-image class="width-100" :src="asset('images/cursor.png')" />
                </figcaption>
              </figure>
              <div class="c-btn-container text-center">
                <button @click="show_modal = true" class="mobile c-gold-btn">
                  <v-lazy-image :src="asset('images/icon-detalle.png')" />
                </button>  
                <a :href="gift.link" target="_blank" class="c-gold-btn">Encuéntralo aquí</a>
              </div>
              <div class="c-center__info">
                <h3 class="c-center__info-title">¡Felicidades!</h3>
                <div class="c-center__info-text">
                  Estás participando en el sorteo de <span class="w-bold">LG VELVET</span>. En caso seas uno de los seleccionados nos estaremos comunicando contigo a través de tu correo.
                </div>
              </div>
            </div>

          </div>
          <div class="cell large-3 l ">
            <div class="c-left">
              <h2 class="c-left__title">el regalo <br class="mobile"> perfecto</h2>
              <p class="c-left__text">
                Ya que <span class="w-bold">{{ raffle.playerFriend.fullname.value }}</span> es <span class="w-bold">{{ behaviour1 }}</span> y <span class="w-bold"> {{ behaviour2 }}</span>.
                Además le gusta <span class="w-bold">{{ activity1 }}</span> y <span class="w-bold">{{ activity2 }}</span>. <br>
                El regalo perfecto es: <span class="w-bold">{{ gift.name }}</span>
              </p>
              <div class="c-left__small">
                También puedes descargar una tarjeta virtual  <a href="" @click="gotToCard">AQUÍ</a>.
              </div>
            </div>

          </div>
          <div class="cell large-3 r">
            <div class="c-right desktop">
              <v-lazy-image class="c-right__icon" :src="asset('images/icon-detalle-g.png')" />
              <h3 class="c-right__title">Especificaciones/ Detalles:</h3>
              <ul class="c-right__list">
                <li v-for="item of gift.details" :key="item.id">{{ item }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="show_modal" class="c-modal position-fixed flex-container align-center-middle width-100">
      <div class="c-modal__content terminos">
        <!-- <div @click="show_modal = false" class="c-modal__cross white">
          x
        </div> -->
        <div class="c-modal__scrool">
          <div>
            <div class="c-modal__info">
              <div class="c-right">
              <h3 class="c-right__title">Especificaciones/ Detalles:</h3>
              <ul class="c-right__list margin-bottom-2">
                <li v-for="item of gift.details" :key="item.id">{{ item }}</li>
              </ul>
              <div class="text-center width-100">
                <button @click="show_modal = false" class="mobile c-gold-btn">
                  Cerrar
                </button>  
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import { mapActions } from 'vuex';

export default{
  data() {
    return {
      show_modal: false
    }
  },
  props: ['raffle', 'gift'],
  computed: {
    behaviour1: function() {
      let payload = '';

      switch (this.raffle.playerFriend.behaviour1.value) {
        case 'a1':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Estudioso' : 'Estudiosa';
          break;

        case 'a2':
          payload = 'Amante de la limpieza';
          break;

        case 'a3':
          payload = 'Deportista';
          break;

        case 'a4':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Cinéfilo' : 'Cinéfila';
          break;
      }

      return payload;
    },
    behaviour2: function() {
      let payload = '';

      switch (this.raffle.playerFriend.behaviour2.value) {
        case 'a1':
          payload = 'Gamer';
          break;

        case 'a2':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Viajero' : 'Viajera';
          break;

        case 'a3':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Hogareño' : 'Hogareña';
          break;

        case 'a4':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Comelón' : 'Comelona';
          break;
      }

      return payload;
    },
    behaviour3: function() {
      let payload = '';

      switch (this.raffle.playerFriend.behaviour3.value) {
        case 'a1':
          payload = 'Alegre';
          break;

        case 'a2':
          payload = 'Workaholic';
          break;

        case 'a3':
          payload = 'Chef';
          break;

        case 'a4':
          payload = (this.raffle.playerFriend.genre.value == 'a1') ? 'Ordenado' : 'Ordenada';
          break;
      }

      return payload;
    },
    activity1: function() {
      let payload = '';

      switch (this.raffle.playerFriend.activity1.value) {
        case 'a1':
          payload = 'Limpiar la casa y ordenar todo';
          break;

        case 'a2':
          payload = 'Estudiar o leer';
          break;

        case 'a3':
          payload = 'Estar con la familia';
          break;

        case 'a4':
          payload = 'Salir con los amigos';
          break;
      }

      return payload;
    },
    activity2: function() {
      let payload = '';

      switch (this.raffle.playerFriend.activity2.value) {
        case 'a1':
          payload = 'Jugar videojuegos';
          break;

        case 'a2':
          payload = 'Cocinar algún platillo';
          break;

        case 'a3':
          payload = 'Salir a correr o hacer algún deporte';
          break;

        case 'a4':
          payload = 'Emprender algún negocio';
          break;
      }

      return payload;
    },
  },
  components: {
    VLazyImage,
  },
  methods: {
    ...mapActions(['changeView']),
    gotToCard: function(e) {
      e.preventDefault();

      this.changeView({view: 'tarjeta'});
    },
  },
}
</script>

