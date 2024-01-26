import Vue from 'vue';
import {baseConfig, baseState} from '../wp_admin'
import {store} from '../store'

new Vue({
  ...baseConfig(store),
  data() {
    return {
      players: [],
      page: 1,

      isLoading: false,
      isMoreParticipants: true,
    }
  },
  computed: {
    ...baseState(),
    reportsLink: function() {
      return `${this.API}/players/download`;
    },
  },
  mounted() {
    this.getPlayers();
  },
  methods: {
    getPlayers: function() {
      const request = `${this.API}/players?page=${this.page}&_wpnonce=${panda.nonce}`;

      fetch(request)
      .then(res => {
        if (res.status >= 200 && res.status < 300) {
          return res.json();
        }else{
          throw res
        }
      })
      .then(response => {
        if (response.status) {
          if (this.players.length) {
            this.players = [
              ...this.players,
              ...response.data
            ];
          } else {
            this.players = response.data;
          }
        } else {
          this.isMoreParticipants = false;
        }

        this.page ++;
      })
      .catch(err => {
        this.isMoreParticipants = false;

        throw err;
      })
    },

    getDateFormated: function(dateAt) {
      const dateTime  = new Date(dateAt);
      const day       = dateTime.toLocaleDateString('es', { month: 'long', day: 'numeric' });
      const hours     = dateTime.getHours();
      const minutes   = dateTime.getMinutes();
      const seconds   = dateTime.getSeconds();

      return `${ day }, ${ dateTime.getFullYear() }  a las ${ hours >= 10 ? hours : '0' + hours }:${ minutes >= 10 ? minutes : '0' + minutes }:${ seconds >= 10 ? seconds : '0' + seconds }`;
    }
  }
})
