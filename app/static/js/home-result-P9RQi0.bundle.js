(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{29:function(a,t,e){"use strict";e.r(t);var s=function(){var a=this,t=a.$createElement,e=a._self._c||t;return e("section",{staticClass:"c-section c-section--result"},[e("div",{staticClass:"c-result"},[e("div",{staticClass:"grid-container width-100 position-relative"},[e("div",{staticClass:"c-result__stars position-absolute desktop"},[e("v-lazy-image",{staticClass:"width-100",attrs:{src:a.asset("images/stars.png")}})],1),a._v(" "),e("div",{staticClass:"c-result__confeti position-absolute"},[e("v-lazy-image",{staticClass:"width-100 desktop",attrs:{src:a.asset("images/confeti.png")}}),a._v(" "),e("v-lazy-image",{staticClass:"width-100 mobile",attrs:{src:a.asset("images/confeti-m.png")}})],1),a._v(" "),e("div",{staticClass:"grid-x grid-margin-x grid-margin-y align-justify align-middle"},[e("div",{staticClass:"cell large-4 c"},[e("div",{staticClass:"c-center"},[e("div",{staticClass:"text-center"},[e("h2",{staticClass:"c-center__title"},[a._v(a._s(a.gift.name))])]),a._v(" "),e("figure",{staticClass:"c-center__figure position-relative"},[e("v-lazy-image",{staticClass:"width-100",attrs:{src:a.asset("images/products/"+a.gift.image+".png")}}),a._v(" "),e("figcaption",{staticClass:"c-center__figcaption desktop"},[e("v-lazy-image",{staticClass:"width-100",attrs:{src:a.asset("images/bg-regalo.png")}})],1),a._v(" "),e("figcaption",{staticClass:"c-center__cursor"},[e("v-lazy-image",{staticClass:"width-100",attrs:{src:a.asset("images/cursor.png")}})],1)],1),a._v(" "),e("div",{staticClass:"c-btn-container text-center"},[e("button",{staticClass:"mobile c-gold-btn",on:{click:function(t){a.show_modal=!0}}},[e("v-lazy-image",{attrs:{src:a.asset("images/icon-detalle.png")}})],1),a._v(" "),e("a",{staticClass:"c-gold-btn",attrs:{href:a.gift.link,target:"_blank"}},[a._v("Encuéntralo aquí")])]),a._v(" "),a._m(0)])]),a._v(" "),e("div",{staticClass:"cell large-3 l "},[e("div",{staticClass:"c-left"},[a._m(1),a._v(" "),e("p",{staticClass:"c-left__text"},[a._v("\n              Ya que "),e("span",{staticClass:"w-bold"},[a._v(a._s(a.raffle.playerFriend.fullname.value))]),a._v(" es "),e("span",{staticClass:"w-bold"},[a._v(a._s(a.behaviour1))]),a._v(" y "),e("span",{staticClass:"w-bold"},[a._v(" "+a._s(a.behaviour2))]),a._v(".\n              Además le gusta "),e("span",{staticClass:"w-bold"},[a._v(a._s(a.activity1))]),a._v(" y "),e("span",{staticClass:"w-bold"},[a._v(a._s(a.activity2))]),a._v(". "),e("br"),a._v("\n              El regalo perfecto es: "),e("span",{staticClass:"w-bold"},[a._v(a._s(a.gift.name))])]),a._v(" "),e("div",{staticClass:"c-left__small"},[a._v("\n              También puedes descargar una tarjeta virtual  "),e("a",{attrs:{href:""},on:{click:a.gotToCard}},[a._v("AQUÍ")]),a._v(".\n            ")])])]),a._v(" "),e("div",{staticClass:"cell large-3 r"},[e("div",{staticClass:"c-right desktop"},[e("v-lazy-image",{staticClass:"c-right__icon",attrs:{src:a.asset("images/icon-detalle-g.png")}}),a._v(" "),e("h3",{staticClass:"c-right__title"},[a._v("Especificaciones/ Detalles:")]),a._v(" "),e("ul",{staticClass:"c-right__list"},a._l(a.gift.details,(function(t){return e("li",{key:t.id},[a._v(a._s(t))])})),0)],1)])])])]),a._v(" "),a.show_modal?e("div",{staticClass:"c-modal position-fixed flex-container align-center-middle width-100"},[e("div",{staticClass:"c-modal__content terminos"},[e("div",{staticClass:"c-modal__scrool"},[e("div",[e("div",{staticClass:"c-modal__info"},[e("div",{staticClass:"c-right"},[e("h3",{staticClass:"c-right__title"},[a._v("Especificaciones/ Detalles:")]),a._v(" "),e("ul",{staticClass:"c-right__list margin-bottom-2"},a._l(a.gift.details,(function(t){return e("li",{key:t.id},[a._v(a._s(t))])})),0),a._v(" "),e("div",{staticClass:"text-center width-100"},[e("button",{staticClass:"mobile c-gold-btn",on:{click:function(t){a.show_modal=!1}}},[a._v("\n                Cerrar\n              ")])])])])])])])]):a._e()])};s._withStripped=!0;var i=e(2),r=e.n(i),c=e(22),l=e.n(c),n=e(1);function o(a,t){var e=Object.keys(a);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(a);t&&(s=s.filter((function(t){return Object.getOwnPropertyDescriptor(a,t).enumerable}))),e.push.apply(e,s)}return e}function v(a){for(var t=1;t<arguments.length;t++){var e=null!=arguments[t]?arguments[t]:{};t%2?o(Object(e),!0).forEach((function(t){r()(a,t,e[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(a,Object.getOwnPropertyDescriptors(e)):o(Object(e)).forEach((function(t){Object.defineProperty(a,t,Object.getOwnPropertyDescriptor(e,t))}))}return a}var d={data:function(){return{show_modal:!1}},props:["raffle","gift"],computed:{behaviour1:function(){var a="";switch(this.raffle.playerFriend.behaviour1.value){case"a1":a="a1"==this.raffle.playerFriend.genre.value?"Estudioso":"Estudiosa";break;case"a2":a="Amante de la limpieza";break;case"a3":a="Deportista";break;case"a4":a="a1"==this.raffle.playerFriend.genre.value?"Cinéfilo":"Cinéfila"}return a},behaviour2:function(){var a="";switch(this.raffle.playerFriend.behaviour2.value){case"a1":a="Gamer";break;case"a2":a="a1"==this.raffle.playerFriend.genre.value?"Viajero":"Viajera";break;case"a3":a="a1"==this.raffle.playerFriend.genre.value?"Hogareño":"Hogareña";break;case"a4":a="a1"==this.raffle.playerFriend.genre.value?"Comelón":"Comelona"}return a},behaviour3:function(){var a="";switch(this.raffle.playerFriend.behaviour3.value){case"a1":a="Alegre";break;case"a2":a="Workaholic";break;case"a3":a="Chef";break;case"a4":a="a1"==this.raffle.playerFriend.genre.value?"Ordenado":"Ordenada"}return a},activity1:function(){var a="";switch(this.raffle.playerFriend.activity1.value){case"a1":a="Limpiar la casa y ordenar todo";break;case"a2":a="Estudiar o leer";break;case"a3":a="Estar con la familia";break;case"a4":a="Salir con los amigos"}return a},activity2:function(){var a="";switch(this.raffle.playerFriend.activity2.value){case"a1":a="Jugar videojuegos";break;case"a2":a="Cocinar algún platillo";break;case"a3":a="Salir a correr o hacer algún deporte";break;case"a4":a="Emprender algún negocio"}return a}},components:{VLazyImage:l.a},methods:v(v({},Object(n.b)(["changeView"])),{},{gotToCard:function(a){a.preventDefault(),this.changeView({view:"tarjeta"})}})},_=e(6),u=Object(_.a)(d,s,[function(){var a=this.$createElement,t=this._self._c||a;return t("div",{staticClass:"c-center__info"},[t("h3",{staticClass:"c-center__info-title"},[this._v("¡Felicidades!")]),this._v(" "),t("div",{staticClass:"c-center__info-text"},[this._v("\n                Estás participando en el sorteo de "),t("span",{staticClass:"w-bold"},[this._v("LG VELVET")]),this._v(". En caso seas uno de los seleccionados nos estaremos comunicando contigo a través de tu correo.\n              ")])])},function(){var a=this.$createElement,t=this._self._c||a;return t("h2",{staticClass:"c-left__title"},[this._v("el regalo "),t("br",{staticClass:"mobile"}),this._v(" perfecto")])}],!1,null,null,null);u.options.__file="src/js/components/Result.vue";t.default=u.exports}}]);