<template>
  <section class="c-section c-section--home">
    <div class="c-header">
      <div class="grid-container">
        <div class="flex-container align-justify align-middle">
          <a href="" class="c-header__icon">
            <v-lazy-image class="width-100" :src="asset('images/lg-logo.png')" />
          </a>

          <a v-if="view == 'main'" href="#form" class="c-play-btn position-relative">
            <v-lazy-image class="width-100" :src="asset('images/btn-play-press.png')" />
            <v-lazy-image class="c-play-btn__top width-100 position-absolute" :src="asset('images/btn-play.png')" />
          </a>

          <div v-if="view == 'result' || view == 'tarjeta'" class="c-btn-fin flex-container align-center-middle">
            <a href="" @click="playAgain($event)" class="c-play-btn position-relative margin-right-1">
              <v-lazy-image class="height-100" :src="asset('images/again.png')" />
              <v-lazy-image class="c-play-btn__top height-100 position-absolute" :src="asset('images/again.png')" />
            </a>
            <a href="" class="c-play-btn position-relative">
              <v-lazy-image class="height-100" :src="asset('images/exit.png')" />
              <v-lazy-image class="c-play-btn__top height-100 position-absolute" :src="asset('images/exit.png')" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <transition name="fade" mode="out-in">
      <Main
        v-if="view === 'main'"
        key="main"
        :raffle.sync="raffle"
        :search="searchGift" />

      <Loading
        v-else-if="view === 'loading'"
        key="loading"
        :raffle.sync="raffle"
        :view.sync="view" />

      <Result
        v-else-if="view === 'result'"
        key="result"
        :view.sync="view"
        :raffle.sync="raffle"
        :gift="gift" />
      <Tarjeta
        v-else key="tarjeta"
        :view.sync="view"
        :raffle.sync="raffle" />
    </transition>
    <div class="c-bar text-center bg-pri-color white">
      <div class="grid-container">
        Copyright 2021 LG Electronics | Todos los derechos reservados
      </div>
    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";
import {mapState, mapActions} from 'vuex';

export default {
  data() {
    return {
      context: {...panda},

      gift: {},

      raffle: {
        try: false,
        sent: false,
        isLoading: false,

        player: {
          lastname: {
            label: 'Nombres',
            value: '',
            pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
            isValid: false
          },
          firstname: {
            label: 'Apellidos',
            value: '',
            pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
            isValid: false
          },
          dni: {
            label: 'DNI',
            value: '',
            pattern: '^[0-9]{1,10}$',
            isValid: false
          },
          email: {
            label: 'E-mail',
            value: '',
            pattern: "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
            isValid: false
          },
          age: {
            label: 'Edad',
            value: '',
            pattern: '^[0-9]{1,10}$',
            isValid: false
          },
          phone: {
            label: 'Celular',
            value: '',
            pattern: '^[0-9+ ]{1,10}$',
            isValid: false
          },
          department: {
            label: 'Departamento',
            value: '',
            isValid: false,
            isLoading: false,
          },
          province: {
            label: 'Provincia',
            value: '',
            isValid: false,
            isLoading: false,
          },
          district: {
            label: 'Distrito',
            value: '',
            isValid: false,
            isLoading: false,
          },

          terms: false,
          politics: false,
        },

        playerFriend: {
          fullname: {
            label: 'Nombres',
            value: '',
            pattern: "^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$",
            isValid: false
          },

          relationship: {
            label: 'Parentesco',
            value: '',
            isValid: false
          },
          age: {
            label: 'Edad',
            value: '',
            isValid: false
          },
          genre: {
            label: 'Sexo',
            value: '',
            isValid: false
          },
          behaviour1: {
            label: '¿Cómo es? (1)',
            value: '',
            isValid: false
          },
          behaviour2: {
            label: '¿Cómo es? (2)',
            value: '',
            isValid: false
          },
          behaviour3: {
            label: '¿Cómo es? (3)',
            value: '',
            isValid: false
          },
          activity1: {
            label: '¿Qué actividades prefiere hacer? (1)',
            value: '',
            isValid: false
          },
          activity2: {
            label: '¿Qué actividades prefiere hacer? (2)',
            value: '',
            isValid: false
          },
          activity3: {
            label: '¿Qué actividades prefiere hacer? (3)',
            value: '',
            isValid: false
          },
          importance: {
            label: 'Importancia',
            value: -1,
            isValid: false
          },
        }
      },
    }
  },
  computed: {
    ...mapState(['view']),
  },
  components: {
    VLazyImage,
    Main: () => import(/* webpackChunkName: "home-main-q92myJ" */'../components/Main.vue'),
    Loading: () => import(/* webpackChunkName: "home-loading-P9RQi0" */'../components/Loading.vue'),
    Result: () => import(/* webpackChunkName: "home-result-P9RQi0" */'../components/Result.vue'),
    Tarjeta: () => import(/* webpackChunkName: "home-tarjeta-5s5SBYcq" */'../components/Tarjeta.vue')
  },
  methods: {
    ...mapActions(['changeView']),
    playAgain: function(e) {
      e.preventDefault();

      window.location.reload();
    },
    validatePlayer: function() {
      return this.raffle.player.firstname.isValid &&
        this.raffle.player.lastname.isValid &&
        this.raffle.player.dni.isValid &&
        this.raffle.player.phone.isValid &&
        this.raffle.player.email.isValid &&
        this.raffle.player.department.isValid &&
        this.raffle.player.province.isValid &&
        this.raffle.player.district.isValid &&
        this.raffle.player.age.isValid &&
        this.raffle.player.terms &&

        this.raffle.playerFriend.fullname.isValid &&
        this.raffle.playerFriend.age.isValid &&
        this.raffle.playerFriend.relationship.isValid &&
        this.raffle.playerFriend.genre.isValid &&

        this.raffle.playerFriend.behaviour1.isValid &&
        this.raffle.playerFriend.behaviour2.isValid &&
        this.raffle.playerFriend.behaviour3.isValid &&

        this.raffle.playerFriend.activity1.isValid &&
        this.raffle.playerFriend.activity2.isValid &&
        this.raffle.playerFriend.activity3.isValid
    },
    searchGift: function() {
      this.raffle.try = true;

      if (this.validatePlayer()) {
        this.raffle.isLoading = true;

        this.changeView({view: 'loading'});
  
        let formData = new FormData();
  
        for (const [key, element] of Object.entries(this.raffle.player)) {
          if (key == 'politics' || key == 'terms') {
            formData.append('player_' + key, (element) ? 1 : 0)
          } else {
            formData.append('player_' + key, element.value)
          }
        }
  
        for (const [key, element] of Object.entries(this.raffle.playerFriend)) {
          formData.append('player_target_' + key, element.value);
        }
  
        formData.append('_wpnonce', this.context.nonce);
  
        fetch(`${ this.context.api }/players`,{
          method: 'POST',
          body: formData
        })
        .then(res => {
          if (res.status >= 200 && res.status < 300) {
            return res.json();
          }else{
            throw res
          }
        })
        .then(response => {
          this.raffle.isLoading = false;
  
          if (response.status) {
            this.gift = response.data;

            setTimeout(() => {
              this.changeView({view: 'result'});
            }, 4000);
          } else {
            setTimeout(() => {
              this.changeView({view: 'main'});
            }, 4000);
          }
        })
        .catch(err => {
          this.raffle.isLoading = false;

          setTimeout(() => {
            this.changeView({view: 'main'});
          }, 4000);

          throw err;
        })
      } else {
        let invalidPlayer = Object.values(this.raffle.player).filter(el => el.hasOwnProperty('isValid') && !el.isValid);
        let invalidPlayerFriend = Object.values(this.raffle.playerFriend).filter(el => el.hasOwnProperty('isValid') && !el.isValid && el.label !== 'Importancia');

        invalidPlayer = invalidPlayer.map(el => el.label);
        invalidPlayerFriend = invalidPlayerFriend.map(el => el.label);

        if (!this.raffle.player.terms) invalidPlayer.push('Terminos y condiciones');

        const errorPlayer = (invalidPlayer.length)
          ? `\n\n 👨 Tus datos: \n (${invalidPlayer.join(', ')})`
          : '';

        const errorPlayerFriend = (invalidPlayerFriend.length)
          ? `\n\n 🎁 ¿Para quien es?: \n (${invalidPlayerFriend.join(', ')})`
          : '';

        alert('❌ Ha ocurrido un error, revise los datos ingresados en: ' + errorPlayer + errorPlayerFriend);
      }
    },
  },
}
</script>

