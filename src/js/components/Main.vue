<template>
  <section class="c-section c-section--main">
    <audio id="audio0" class="audio" controls="" preload="auto">
      <source :src="asset('images/beep.mp3')" controls="">              
      no audio
    </audio>
    <div class="c-banner position-relative">
      <v-lazy-image class="desktop width-100" :src="asset('images/banner.png')" />
      <v-lazy-image class="mobile width-100" :src="asset('images/banner-m.png')" />
      <div v-if="false" class="c-banner__shade position-absolute width-100">
        <v-lazy-image class="c-banner__title desktop" :src="asset('images/banner-title.png')" />
        <v-lazy-image class="c-banner__text desktop" :src="asset('images/banner-text.png')" />
      </div>
      <div v-if="false" class="c-banner__shade c-banner__shade--top position-absolute flex-container">
        <div class="left">
          <v-lazy-image class="st-1" :src="asset('images/star-1.png')" />
          <br/>
          <v-lazy-image class="st-2" :src="asset('images/star-2.png')" />
          <br/>
          <v-lazy-image class="st-3" :src="asset('images/star-1.png')" />
        </div>
        <div class="right">
          <v-lazy-image class="st-1" :src="asset('images/star-1.png')" />
          <br/>
          <v-lazy-image class="st-2" :src="asset('images/star-2.png')" />
          <br/>
          <v-lazy-image class="st-3" :src="asset('images/star-1.png')" />
        </div>
      </div>
    </div>
    <div class="c-steps position-relative">
      <div class="grid-container">
        <div class="grid-x grid-margin-x grid-margin-y">
          <div class="cell large-4">
            <div class="c-step flex-container align-center-middle">
              <figure class="c-step__figure">
                <v-lazy-image class="width-100" :src="asset('images/step-1.png')" />
              </figure>
              <div class="c-step__text text-center">
                <strong>Llena el cuestionario</strong> pensando en la persona que quieres  darle una sorpresa.
              </div>
            </div>
          </div>
          <div class="cell large-4">
            <div class="c-step flex-container align-center-middle">
              <figure class="c-step__figure">
                <v-lazy-image class="width-100" :src="asset('images/step-2.png')" />
              </figure>
              <div class="c-step__text text-center">
                Descubre <strong>el regalo perfecto</strong> y donde encontrarlo para sorprenderlo(a) esta navidad.
              </div>
            </div>
          </div>
          <div class="cell large-4">
            <div class="c-step flex-container align-center-middle">
              <figure class="c-step__figure">
                <v-lazy-image class="width-100" :src="asset('images/step-3.png')" />
              </figure>
              <div class="c-step__text text-center">
                <strong>Síguenos en nuestras redes sociales</strong> pues podrías ser el ganador del sorteo.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="c-banner__shade c-banner__shade--steps width-100 position-absolute flex-container">
        <div class="left">
          <v-lazy-image class="width-100" :src="asset('images/green-l.png')" />
        </div>
        <div class="right">
          <v-lazy-image class="width-100" :src="asset('images/green-r.png')" />
        </div>
      </div>
    </div>
    <div id="form" class="c-register">
      <h3 class="c-register__title text-center position-relative"> 
        <div class="grid-container flex-container align-center-middle">
          <span class="c-star"><v-lazy-image class="width-100" :src="asset('images/star-gold.png')" /></span>  
          ¿Estás listo para sorprender a esa persona? 
          <span class="c-star"><v-lazy-image class="width-100" :src="asset('images/star-gold.png')" /></span>
        </div>
        <div class="c-register__shade desktop position-absolute width-100 height-100 of-hidden">
          <div class="grid-container flex-container align-justify ">
            <div class="l">
              <v-lazy-image class="width-100" :src="asset('images/regalo-1.png')" />
            </div>
            <div class="r">
              <v-lazy-image class="width-100" :src="asset('images/regalo-1.png')" />
            </div>
          </div>
        </div>
      </h3>
      <section>
        <div class="c-mount">
          <input id="mount-head" class="hd" type="checkbox" value="0" checked="checked">
          <label for="mount-head" class="c-mount__head width-100 text-center white position-relative">
            <div class="grid-container">
              <p><span class="sec-color">+</span>  Déjanos tus datos</p>
            </div>
            <div class="c-register__shade desktop  position-absolute width-100 height-100 of-hidden">
              <div class="grid-container flex-container align-justify ">
                <div class="l l-c b">
                  <v-lazy-image class="width-100" :src="asset('images/star-3.png')" />
                </div>
                <div class="r r-c b">
                  <v-lazy-image class="width-100" :src="asset('images/star-3.png')" />
                </div>
              </div>
            </div>
          </label>
          <div class="c-mount__body">
            <div class="grid-container">
              <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell large-6">
                  <div class="input-container">
                  </div>
                  <div class="input-container">
                    <input v-model="raffle.player.firstname.value" type="text" placeholder="Nombre*">
                    <p v-if="isWrongField('firstname', 'player')" class="alert">Nombres vacíos o incorrecto</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.player.lastname.value" type="text" placeholder="Apellidos*">
                    <p v-if="isWrongField('lastname', 'player')" class="alert">Apellidos vacíos o incorrecto</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.player.dni.value" type="text" placeholder="DNI o Carnét de extranjería*">
                    <p v-if="isWrongField('dni', 'player')" class="alert">DNI vacío o incorrecto</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.player.email.value" type="email" placeholder="Correo*">
                    <p v-if="isWrongField('email', 'player')" class="alert">Correo vacío o incorrecto</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.player.phone.value" type="tel" placeholder="Celular*">
                    <p v-if="isWrongField('phone', 'player')" class="alert">Celular vacío o incorrecto</p>
                  </div>
                </div>

                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                    <select v-model="raffle.player.department.value" @change="getProvincias">
                      <option disabled value="" selected>Escoge tu departamento</option>
                      <option v-for="dep of departamentos" :key="dep.id" :value="dep.nombre_ubigeo" >{{ dep.nombre_ubigeo }}</option>
                    </select>
                    </div>
                    <p v-if="isWrongField('department', 'player')" class="alert">Debe elegir un departamento</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                      <select v-model="raffle.player.province.value" @change="getDistritos">
                        <option disabled value="" selected>{{ (raffle.player.province.isLoading) ? 'Cargando...' :'Escoge tu ciudad' }}</option>
                        <option v-for="prov of provincias" :key="prov.id" :value="prov.nombre_ubigeo" >{{ prov.nombre_ubigeo }}</option>
                      </select>
                    </div>
                    <p v-if="isWrongField('province', 'player')" class="alert">Debe elegir una ciudad</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                      <select v-model="raffle.player.district.value">
                        <option disabled value="" selected>{{ (raffle.player.district.isLoading) ? 'Cargando...' :'Escoge tu distrito' }}</option>
                        <option v-for="dis of distritos" :key="dis.id" :value="dis.nombre_ubigeo" >{{ dis.nombre_ubigeo }}</option>
                      </select>
                    </div>
                    <p v-if="isWrongField('district', 'player')" class="alert">Debe elegir un distrito</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.player.age.value" type="text" placeholder="Edad*">
                    <p v-if="isWrongField('age', 'player')" class="alert">Edad vacía o incorrecta</p>
                  </div>
                </div>
                <div class="cell">
                  <div class="c-check-group flex-container">
                    <div class="checkbox-container">
                      <div class="flex-container align-center-middle">
                        <input type="checkbox" v-model="raffle.player.terms" > <label for="" class="white">Acepto <span class="underline" @click="show_terminos = true">términos y condiciones</span></label>
                      </div>
                    </div>
                    <div class="checkbox-container">
                      <div class="flex-container align-center-middle">
                        <input type="checkbox"  v-model="raffle.player.politics"> <label for="" class="white">Acepto <span class="underline" @click="show_politicas = true">políticas de privacidad</span></label>
                      </div>
                    </div>
                    <p v-if="isWrongField('terms', 'player', false)" class="alert width-100 text-center white">Debe aceptar los términos y condiciones</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="c-mount margin-bottom-0 of-hidden">
          <input id="mount-head-2" class="hd" type="checkbox" value="0" checked="checked">
          <label for="mount-head-2" class="c-mount__head text-center width-100 white position-relative">
            <div class="grid-container">
              <p><span class="sec-color">+</span> ¿Para quién es?  Cuéntanos un poco</p>
            </div>
            <div class="c-register__shade desktop position-absolute width-100 height-100 of-hidden">
              <div class="grid-container flex-container align-justify ">
                <div class="l l-b m">
                  <v-lazy-image class="width-100" :src="asset('images/regalo-2.png')" />
                </div>
                <div class="r r-b b">
                  <v-lazy-image class="width-100" :src="asset('images/regalo-2.png')" />
                </div>
              </div>
            </div>
          </label>
          <div class="c-mount__body">
            <div class="grid-container">
              <div class="grid-x grid-margin-x grid-margin-y">
                <div class="cell margin-bottom-0">
                  <h3 class="c-mount__title">Datos de la persona a quien vas a regalar</h3>
                  <p class="c-mount__text">(Si es para ti, llena tus datos)</p>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <input v-model="raffle.playerFriend.fullname.value" type="text" placeholder="Nombre*">
                    <p v-if="isWrongField('fullname', 'playerFriend', true)" class="alert">Nombres vacíos o incorrecto</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                      <select v-model="raffle.playerFriend.relationship.value" id="">
                        <option disabled selected value="">Parentesco</option>
                        <option value="a1">Para mí</option>
                        <option value="a1-a">Amigo o Amiga</option>
                        <option value="a2">Hermano o hermana</option>
                        <option value="a3">Papá o mamá</option>
                        <option value="a4">Hijo o hija</option>
                        <option value="a1-b">Pareja</option>
                        <option value="a1-c">Otro</option>
                      </select>
                    </div>
                    <p v-if="isWrongField('relationship', 'playerFriend', true)" class="alert">Debe elegir una opción</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                      <select v-model="raffle.playerFriend.age.value" id="">
                        <option disabled selected value="">Edad</option>
                        <option value="a1">Menos de 10</option>
                        <option value="a2">10 a 18</option>
                        <option value="a3">19 a 28</option>
                        <option value="a4">29 a 50</option>
                        <option value="a5">51 a más</option>
                      </select>
                    </div>
                    <p v-if="isWrongField('age', 'playerFriend', true)" class="alert">Debe elegir un rango</p>
                  </div>
                </div>
                <div class="cell large-6">
                  <div class="input-container">
                    <div class="position-relative">
                      <span class="c-tri position-absolute"></span>
                      <select v-model="raffle.playerFriend.genre.value" id="">
                        <option disabled selected value="">Género</option>
                        <option value="a1">Másculino</option>
                        <option value="a2">Femenino</option>
                      </select>
                    </div>
                    <p v-if="isWrongField('genre', 'playerFriend', true)" class="alert">Debe elegir una opción</p>
                  </div>
                </div>
                <div class="cell margin-bottom-0">
                  <h3 class="c-mount__title">¿Cómo es?</h3>
                  <p class="c-mount__text">Elija 1 de las 4 personalidades más acorde</p>
                </div>
                <div class="cell">
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="estudioso" value="a1" v-model="raffle.playerFriend.behaviour1.value" type="radio" hidden>
                        <label for="estudioso" class="c-checkbox-label">
                          <span class="c-circle"></span> Estudioso
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="limpieza" value="a2" v-model="raffle.playerFriend.behaviour1.value" type="radio" hidden>
                        <label for="limpieza" class="c-checkbox-label">
                          <span class="c-circle"></span> Amante de la limpieza
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="deportista" value="a3" v-model="raffle.playerFriend.behaviour1.value" type="radio" hidden>
                        <label for="deportista" class="c-checkbox-label">
                          <span class="c-circle"></span> Deportista
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="cinefilo " value="a4 " v-model="raffle.playerFriend.behaviour1.value" type="radio" hidden>
                        <label for="cinefilo " class="c-checkbox-label">
                          <span class="c-circle"></span> Cinéfilo 
                        </label>
                      </div>
                    </div>   
                  </div> 
                  <p v-if="isWrongField('behaviour1', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>
                </div>
                <div v-if="raffle.playerFriend.behaviour1.isValid" class="cell">
                  <p class="c-mount__text">Elija 1 de las 4 personalidades más acorde</p>
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="gamer" value="a1" v-model="raffle.playerFriend.behaviour2.value" type="radio" hidden>
                        <label for="gamer" class="c-checkbox-label">
                          <span class="c-circle"></span> Gamer
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="viajero" value="a2" v-model="raffle.playerFriend.behaviour2.value" type="radio" hidden>
                        <label for="viajero" class="c-checkbox-label">
                          <span class="c-circle"></span> Viajero
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="hogareno" value="a3" v-model="raffle.playerFriend.behaviour2.value" type="radio" hidden>
                        <label for="hogareno" class="c-checkbox-label">
                          <span class="c-circle"></span> Hogareño
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="comelon" value="a4" v-model="raffle.playerFriend.behaviour2.value" type="radio" hidden>
                        <label for="comelon" class="c-checkbox-label">
                          <span class="c-circle"></span> Comelón
                        </label>
                      </div>
                    </div>   
                  </div>  
                  <p v-if="isWrongField('behaviour2', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>
                </div>
                <div v-if="raffle.playerFriend.behaviour2.isValid" class="cell">
                  <p class="c-mount__text">Elija 1 de las 4 personalidades más acorde</p>
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="alegre" value="a1" v-model="raffle.playerFriend.behaviour3.value" type="radio" hidden>
                        <label for="alegre" class="c-checkbox-label">
                          <span class="c-circle"></span> Alegre
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="workhacolic" value="a2" v-model="raffle.playerFriend.behaviour3.value" type="radio" hidden>
                        <label for="workhacolic" class="c-checkbox-label">
                          <span class="c-circle"></span> Workhacolic
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="chef" value="a3" v-model="raffle.playerFriend.behaviour3.value" type="radio" hidden>
                        <label for="chef" class="c-checkbox-label">
                          <span class="c-circle"></span> Chef
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="ordenado" value="a4" v-model="raffle.playerFriend.behaviour3.value" type="radio" hidden>
                        <label for="ordenado" class="c-checkbox-label">
                          <span class="c-circle"></span> Ordenado
                        </label>
                      </div>
                    </div>   
                  </div>  
                  <p v-if="isWrongField('behaviour3', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>  
                </div>        
                <div class="cell margin-bottom-0">
                  <h3 class="c-mount__title">¿Qué actividades prefiere hacer?</h3>
                  <p class="c-mount__text">Elija 1 de las 4 actividades más acorde</p>
                </div>
                <div class="cell">
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="ordenar" value="a1" v-model="raffle.playerFriend.activity1.value" type="radio" hidden>
                        <label for="ordenar" class="c-checkbox-label">
                          <span class="c-circle"></span> Limpiar y ordenar todo
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="estudiar" value="a2" v-model="raffle.playerFriend.activity1.value" type="radio" hidden>
                        <label for="estudiar" class="c-checkbox-label">
                          <span class="c-circle"></span> Estudiar o leer
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="familia" value="a3" v-model="raffle.playerFriend.activity1.value" type="radio" hidden>
                        <label for="familia" class="c-checkbox-label">
                          <span class="c-circle"></span> Estar con la familia
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="amigos" value="a4" v-model="raffle.playerFriend.activity1.value" type="radio" hidden>
                        <label for="amigos" class="c-checkbox-label">
                          <span class="c-circle"></span> Salir con los amigos
                        </label>
                      </div>
                    </div>   
                  </div>  
                  <p v-if="isWrongField('activity1', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>
                </div>
                <div v-if="raffle.playerFriend.activity1.isValid" class="cell">
                  <p class="c-mount__text">Elija 1 de las 4 actividades más acorde</p>
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="jugar" value="a1" v-model="raffle.playerFriend.activity2.value" type="radio" hidden>
                        <label for="jugar" class="c-checkbox-label">
                          <span class="c-circle"></span> Jugar videojuegos
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="cocinar" value="a2" v-model="raffle.playerFriend.activity2.value" type="radio" hidden>
                        <label for="cocinar" class="c-checkbox-label">
                          <span class="c-circle"></span> Cocinar algún platillo
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="deporte" value="a3" v-model="raffle.playerFriend.activity2.value" type="radio" hidden>
                        <label for="deporte" class="c-checkbox-label">
                          <span class="c-circle"></span> Salir a correr o hacer algún deporte
                        </label>
                      </div>
                    </div>                
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="negocio" value="a4" v-model="raffle.playerFriend.activity2.value" type="radio" hidden>
                        <label for="negocio" class="c-checkbox-label">
                          <span class="c-circle"></span> Emprender algún negocio
                        </label>
                      </div>
                    </div>   
                  </div> 
                  <p v-if="isWrongField('activity2', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>
                </div>
                <div v-if="raffle.playerFriend.activity2.isValid" class="cell">
                  <p class="c-mount__text">Elija 1 de las 4 actividades más acorde</p>
                  <div class="grid-x grid-margin-x grid-margin-y">
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="musica" value="a1" v-model="raffle.playerFriend.activity3.value" type="radio" hidden>
                        <label for="musica" class="c-checkbox-label">
                          <span class="c-circle"></span> Escuchar música
                        </label>
                      </div>
                    </div>
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="peliculas" value="a2" v-model="raffle.playerFriend.activity3.value" type="radio" hidden>
                        <label for="peliculas" class="c-checkbox-label">
                          <span class="c-circle"></span> Ver películas o series
                        </label>
                      </div>
                    </div>  
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="viajar" value="a3" v-model="raffle.playerFriend.activity3.value" type="radio" hidden>
                        <label for="viajar" class="c-checkbox-label">
                          <span class="c-circle"></span> Viajar y conocer algún lugar
                        </label>
                      </div>
                    </div>               
                    <div class="cell large-6">
                      <div class="input-container">
                        <input id="comer" value="a4" v-model="raffle.playerFriend.activity3.value" type="radio" hidden>
                        <label for="comer" class="c-checkbox-label">
                          <span class="c-circle"></span> Comer comida rápida
                        </label>
                      </div>
                    </div>                  
                  </div> 
                  <p v-if="isWrongField('activity3', 'playerFriend', true)" class="alert text-center white">Debe elegir una opción</p>
                </div>
                <div class="cell margin-bottom-0">
                  <h3 class="c-mount__title">¿Qué tan importante es esa persona para ti?</h3>
                  <div class="c-range__container margin-vertical-2 flex-container align-center">
                    <input v-model="raffle.playerFriend.importance.value" type="range" min="0" max="9" value="0" class="c-range">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="c-btn-container bg-white text-center">
          <div class="grid-container">
              <button @click="searchLocal()" class="c-gold-btn">
                <span>¡Buscar regalo! 
                <v-lazy-image :src="asset('images/regalo.png')" />
                </span>
              </button>
              <div v-if="false" class="c-btn-message text-center fs-14 margin-top-3">
                <span class="">Debes completar los siguientes requisitos para realizar la búsqueda:</span>
                <p class="pri-color">
                  Debe seleccionar al menos una opción de ‘Personalidad’
                </p>
              </div>
          </div>
        </div>
      </section>
    </div>

    <div v-if="show_terminos" class="c-modal position-fixed flex-container align-center-middle width-100">
      <div class="c-modal__content terminos">
        <div @click="show_terminos = false" class="c-modal__cross">
          x
        </div>
        <div class="c-modal__scrool">
          <div>
            <div class="c-modal__info black">
              <h2 class="text-center margin-top-3 margin-bottom-2">Términos y Condiciones</h2>
              <div>
                Este reglamento tiene como finalidad regular la actividad promocional “Descubre tu Regalo Perfecto” que realiza la empresa LG ELECTRONICS PERÚ S.A.C
                <br>
                <br>
                <strong>DESCRIPCIÓN DE LA ACTIVIDAD</strong>
                <br>
                “Descubre tu Regalo Perfecto” es una actividad en la página web de LG ELECTRONICS (www.lg.com/pe) que tiene como finalidad que cada participante descubra cuál es su regalo perfecto mediante unas preguntas sobre edad, genero, gustos y preferencias. Al finalizar el llenado el sistema le podrá adquirir el producto de que califica como “el regalo perfecto”,  de acuerdo a la información especificada. Todas las personas que llenen el cuestionario entran a un sorteo por un smarthphone LG Velvet.
                <br>
                <br>
                Nombre de la Actividad: “Descubre tu Regalo Perfecto” <br>
                Fecha de Inicio: 26 de Noviembre del 2021 <br>
                Fecha de Finalización: 10 de Enero del 2022 <br>
                Duración: 45 días <br>
                Premio: 1 Smarthphone LG Velvet valorizado en $250 <br>
                Merecedor: Una (1) persona que haya resultado ganadora del sorteo aleatorio. <br>
                Ganadores en total: Un (01) <br>
                Ámbito territorial: Perú <br>
                <br>
                <div class="text-center"> <strong>MECÁNICA.</strong></div>
                1. El usuario debe cumplir correctamente con la dinámica. <br>
                2. Los únicos participantes serán aquellos que cumplan con todos los requisitos: Llenar sus datos en la página web: www.lg.com/pe/descubreturegaloperfecto y responder todas las preguntas hasta que la page te sugiera el regalo perfecto.<br>
                3. Se puede participar más de (1) vez, pero solicitando sugerencias de regalos perfectos para distintas personas.<br>
                4. Una vez ingresados los datos correctamente ingresarán al sorteo a realizarse el día Martes 11 de Enero del 2022 a horas 4:00 pm en las oficinas de LG Electronics Peru S.A. ubicadas en la Av. República de Colombia 791, piso 12, San Isidro, Lima. El sorteo será aleatorio y no contará con la participación de Notario Público.<br>
                5. LG Electronics se pondrá en contacto vía correo electrónico con el ganador para que se acerque a recoger su premio. <br>
                <br>
                <strong>ANOTACIONES GENERALES:</strong>
                <br>
                - Sólo podrán participar mayores de 18 años. <br>
                - Serán excluidas todas las personas que tengan nombres falsos o cuya información proporcionada no coincida con la información de su DNI, o que sean menores de edad.<br>
                - Podrán participar en la promoción sólo las personas con nacionalidad peruana y extranjeros residentes que cuenten con carnet de extranjería.<br>
                - Promoción válida únicamente para Perú.<br>
                - El premio no podrá cambiarse por otro, ni se podrá canjear por efectivo.<br>
                <br>
                <strong>RELACIÓN DE LOS PREMIOS</strong> 
                <br>
                Habrá (1) un premio, el cuál será (1) un Smarthphone LG VELVET valorizado en $250
                <br><br>
                <strong>ENTREGA DE LOS PREMIOS</strong> 
                <br>
                Los premios serán entregados al ganador en nuestras oficinas ubicadas en Av. República de Colombia 791, piso 12, San isidro, Lima, Perú.<br>
                El ganador deberá de apersonarse a la dirección antes señalada a recoger el premio en un plazo de 90  días naturales desde el día siguiente en que le fue comunicado el resultado del sorteo; vencido dicho plazo el ganador perderá su derecho a recoger el premio sin lugar a reclamo alguno.<br>
                Para recoger el premio el ganador deberá presentar su documento de identidad y cumplir con el protocolo que se le comunicará vía correo electrónico.<br>
                El ganador recoge el premio por su cuenta, costo y riesgo. LG ELECTRONICS PERU S.A. no reconoce ningún tipo de gastos por este motivo.<br>
                <br>
                <strong>LEGAL: </strong> 
                <br>
                - Los organizadores tienen un Código de Principios en los Negocios, de cuya aplicación se desprenden postulados como la obediencia a la ley y la protección propia, sus empleados, sus clientes, sus accionistas y proveedores. Así, bajo ninguna circunstancia los participantes estarán autorizados para llevar a cabo y por cuenta de los organizadores, actos que puedan originar registros o informaciones inexactas o inadecuadas respecto de los activos, responsabilidades o cualquier otra transacción, o que puedan violar cualquier norma. Por ello, los regalos no serán redimibles, transferible, ni reembolsables por ningún motivo.<br>
                - El merecedor no podrá solicitar ningún tipo de pago o indemnización adicional de lo establecido en la presente ACTIVIDAD, por lo queda claro que no habrá ningún tipo de reclamación posterior al Organizador.<br>
                - Los organizadores se reservan el derecho a eliminar imágenes enviadas que, según su criterio, consideren puedan constituir delito o sean inapropiadas para este concurso; por ejemplo (y sin limitación alguna), debido a su contenido violento, criminal, religioso, político, racial o sexual, entre otros.<br>
                - No cargará Contenido ilegal, peligroso, amenazador, abusivo, tortuoso, difamatorio, vulgar, obsceno, calumnioso, invasivo del derecho a la intimidad, odioso, o racial, étnica o de cualquier otra forma ofensivo.<br>
                - Mantendrá indemne a los Organizadores sobre cualquier tipo de responsabilidad sobre el contenido cargado.<br>
                - El usuario no podrá cargar algún Contenido que viole alguna patente, marca, secreto comercial, derecho de autor o cualquier derecho de propiedad de alguna parte.<br>
                - Autoriza la modificación de su imagen y fotografía, con el fin que sean convertidas a los formatos que se requieran según el medio en que se vaya a efectuar las explotaciones correspondientes (comerciales, mercadeo y/o publicidad entre otros). (…)<br>
                <br>
                <strong>CONDICIONES ESPECIALES</strong> 
                <br>
                - En caso registrar información incompleta o inexacta el participante quedará excluido.<br>
                - La contraprestación es personal e intransferible, no podrá ser redimida por dinero y no es canjeable.<br>
                <br>
                <strong>INFORMACIÓN IMPRECISA O FALSA:</strong> 
                <br>
                - En caso de identificar fraude por parte de alguno de los participantes, los organizadores podrán descalificarlo sin el deber de notificarle. De igual manera si los organizadores detectan información falsa o imprecisa o a su juicio cualquier infracción que los confunda o que vaya en detrimento de la (s) marca (s) que se promociona, de la compañía, de sus empleados o accionistas, el participante será descalificado sin que exista el deber de notificarle la descalificación. En consecuencia, el regalo es personal y se entregará sobre los datos reales consignados en el formulario de inscripción de tal manera que si hay datos no reales, falsos ó imprecisos, no habrá lugar a la entrega del regalo y los organizadores se reservan el derecho de iniciar acciones legales. <br>
                - En caso se compruebe por el organizador que un participante está cometiendo fraude para poder reclamar los productos, este quedará descartado automáticamente. <br>
                <br>
                <strong>PUBLICACIÓN</strong> 
                <br>
                - El presente REGLAMENTO le será dado a conocer a cada uno de los participantes de la ACTIVIDAD, quienes deberán aceptarlo en señal de aceptación del mismo y de su compromiso de cumplirlo. <br>
                - De conformidad a disposiciones legales, este reglamento será debidamente divulgado para el conocimiento y aceptación de las participantes en general, el cual es obligatorio para las partes. <br>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div v-if="show_politicas" class="c-modal position-fixed flex-container align-center-middle width-100">
      <div class="c-modal__content terminos">
        <div @click="show_politicas = false" class="c-modal__cross">
          x
        </div>
        <div class="c-modal__scrool">
          <div>
            <div class="c-modal__info">
              <h2 class="text-center margin-top-3 margin-bottom-2">Políticas de Privacidad</h2>
              <div>
                <p>
                Por el presente documento el Participante otorga libremente su consentimiento para que sus datos personales sean tratados y almacenados en el banco de datos de “Atención a Clientes”, debidamente inscrito en el Registro Nacional de Protección de Datos Personales con Código de Registro N° 11919 de titularidad de <strong>LG ELECTRONICS PERÚ S.A.</strong> (en adelante, <strong>“LGE PERÚ o NOSOTROS”</strong>), con domicilio en Av. República de Colombia N° 791 Piso 12, San Isidro, Lima, Perú, por un plazo indeterminado o hasta que decida revocar el presente consentimiento.
                </p>
                <p>
                    Las finalidades autorizadas son: (i) organizar, implementar y ejecutar la Promoción; (ii) llevar un registro del participante para fines estadísticos e históricos; (iii) remitir promociones, beneficios, concursos, ofertas y, en general, publicidad sobre los productos y servicios de <strong>LGE PERÚ</strong>; (iv) obtener información de fuentes de acceso públicas y privadas para fines de perfilamiento y prospección comercial; y, (v) ceder total o parcialmente la utilización de las imágenes y voz en ámbito nacional e internacional a <strong>LGE PERÚ</strong>, en forma irrestricta, indefinida y por cualquier medio que incluye, más no se restringe a televisión, cable, radio, cine, periódicos, revistas, publicidad exterior y/o Internet, redes sociales (teniendo la opción de compartir o publicitar para que llegue a más personas,), afiches, murales internos, plataformas físicas o digitales. 
                </p>
                <p>
                    Asimismo, el Participante declara que: (i) cuenta con la autorización expresa de los titulares de los datos personales que aparecen en los videos utilizados para participar en la Promoción; (ii) renuncia de forma irrevocable y permanente a cualquier beneficio o compensación económica o de cualquier naturaleza, por dicho concepto o cualquier otro; (ii) cede y transfiere en forma total e íntegra, de manera exclusiva, ilimitada, a nivel mundial y por el tiempo establecido en el artículo 52º del Decreto Legislativo Nº822, los derechos de autor de las imágenes y voz a <strong>LGE PERÚ</strong>, dejándose expresamente establecido que la cesión abarca el derecho exclusivo de realizar, autorizar o prohibir la reproducción del video por cualquier forma o procedimiento, la comunicación al público de las imágenes y voz por cualquier medio, la distribución al público, la traducción, adaptación, arreglo u otra transformación de las imágenes y voz y/o cualquier otra forma de utilización de las obras.
                </p>
                <p>
                    Se le comunica que <strong>LGE PERÚ</strong> podrá compartir y encargar el tratamiento de sus datos personales a organización o personas directamente relacionadas, empresas prestadoras de servicios en la nube y empresas dedicadas a la publicidad o marketing. En estos casos, <strong>LGE PERÚ</strong> garantizará que el tratamiento de sus datos se limite a las finalidades antes autorizadas, que se mantenga confidencial y se implementen las medidas de seguridad adecuadas. 
                </p>
                <p>
                    El Participante manifiesta que se le ha informado que: (i) el detalle de los terceros Los terceros que pueden acceder son: agentes, contratistas, proveedores de servicios, proveedores de premios y, según sea necesario, a las autoridades reguladoras y cualquier variación de estos será actualizada en siguiente enlace https://www.lg.com/pe/privacy; (ii) la presente autorización es indispensable para cumplir con las finalidades antes mencionadas; y, (iii) podrá ejercer los derechos previstos en la Ley N° 29733 enviando su solicitud a la dirección de correo electrónico pdp-peru@lge.com o a la siguiente dirección: Av. República de Colombia N° 791 Piso 12, San Isidro, Lima – Perú ". 
                </p>
                <p>
                    En caso, considere que no ha sido atendido, podrá presentar una reclamación ante la Autoridad Nacional de Protección de Datos Personales, dirigiéndose a la Mesa de Partes del Ministerio de Justicia y Derechos Humanos ubicado en Calle Scipión Llona N° 350, Miraflores, Lima, Perú. 
                </p>
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
import { validateText, validateSelect } from '../libs/form';
import { mapActions } from 'vuex';

export default {
  data() {
    return {
      context: {...panda},

      show_politicas: false,
      show_terminos: false,

      departamentos: [],
      provincias: [],
      distritos: [],
    };
  },
  components: {
    VLazyImage,
  },
  props: ['raffle', 'search'],
  mounted() {
    this.getDepartamentos();
  },
  watch: {
    'raffle.player.firstname.value': function() {
      this.raffle.player.firstname.isValid = this.validateText(this.raffle.player.firstname);
    },
    'raffle.player.lastname.value': function() {
      this.raffle.player.lastname.isValid = this.validateText(this.raffle.player.lastname);
    },
    'raffle.player.dni.value': function() {
      this.raffle.player.dni.isValid = this.validateText(this.raffle.player.dni);
    },
    'raffle.player.email.value': function() {
      this.raffle.player.email.isValid = this.validateText(this.raffle.player.email);
    },
    'raffle.player.phone.value': function() {
      this.raffle.player.phone.isValid = this.validateText(this.raffle.player.phone);
    },

    'raffle.player.department.value': function() {
      this.validateSelect(this.raffle.player.department);
    },
    'raffle.player.province.value': function() {
      this.validateSelect(this.raffle.player.province);
    },
    'raffle.player.district.value': function() {
      this.validateSelect(this.raffle.player.district);
    },
    'raffle.player.age.value': function() {
      this.raffle.player.age.isValid = this.validateText(this.raffle.player.age);
    },

    'raffle.playerFriend.fullname.value': function() {
      this.raffle.playerFriend.fullname.isValid = this.validateText(this.raffle.playerFriend.fullname);
    },
    'raffle.playerFriend.age.value': function() {
      this.raffle.playerFriend.age.isValid = (this.raffle.playerFriend.age.value) ? true : false;
    },
    'raffle.playerFriend.relationship.value': function() {
      this.validateSelect(this.raffle.playerFriend.relationship);
    },
    'raffle.playerFriend.genre.value': function() {
      this.validateSelect(this.raffle.playerFriend.genre);
    },
    'raffle.playerFriend.behaviour1.value': function() {
      this.validateSelect(this.raffle.playerFriend.behaviour1);
    },
    'raffle.playerFriend.behaviour2.value': function() {
      this.validateSelect(this.raffle.playerFriend.behaviour2);
    },
    'raffle.playerFriend.behaviour3.value': function() {
      this.validateSelect(this.raffle.playerFriend.behaviour3);
    },
    'raffle.playerFriend.activity1.value': function() {
      this.validateSelect(this.raffle.playerFriend.activity1);
    },
    'raffle.playerFriend.activity2.value': function() {
      this.validateSelect(this.raffle.playerFriend.activity2);
    },
    'raffle.playerFriend.activity3.value': function() {
      this.validateSelect(this.raffle.playerFriend.activity3);
    },
  },
  methods: {
    ...mapActions(['changeView']),
    validateText,
    validateSelect,
    isWrongField: function(field, object, multiple = true) {
      if (multiple) {
        return this.raffle.try && !this.raffle[object][field].isValid;
      } else {
        return this.raffle.try && !this.raffle[object][field];
      }
    },

    getDepartamentos: function() {
      fetch(`${ this.context.api }/geo?_wpnonce=${ panda.nonce }`)
      .then(res => {
        if (res.status >= 200 && res.status < 300) {
          return res.json();
        }else{
          throw res
        }
      })
      .then(response => {
        if (response.status) {
          this.departamentos = response.data;
        }
      })
      .catch(err => {
        throw err;
      })
    },
    getProvincias: function(option) {
      const department = this.departamentos[option.target.selectedIndex - 1].id_ubigeo;

      this.raffle.player.province.value      = '';
      this.raffle.player.district.value      = '';
      this.raffle.player.province.isLoading  = true;
      this.raffle.player.province.isValid    = false;

      this.provincias = [];
      this.distritos  = [];

      fetch(`${ this.context.api }/geo?dep=${ department }&_wpnonce=${ panda.nonce }`)
      .then(res => {
        if (res.status >= 200 && res.status < 300) {
          return res.json();
        }else{
          throw res
        }
      })
      .then(response => {
        if (response.status) {
          this.provincias = response.data;
        }

        this.raffle.player.province.isLoading = false;
      })
      .catch(err => {
        this.raffle.player.province.isLoading = false;

        throw err;
      })
    },
    getDistritos: function(option) {
      const province = this.provincias[option.target.selectedIndex - 1].id_ubigeo;

      this.raffle.player.district.value       = '';
      this.raffle.player.district.isLoading   = true;
      this.raffle.player.district.isValid     = false;

      this.distritos  = [];

      fetch(`${ this.context.api }/geo?prov=${ province }&_wpnonce=${ panda.nonce }`)
      .then(res => {
        if (res.status >= 200 && res.status < 300) {
          return res.json();
        }else{
          throw res
        }
      })
      .then(response => {
        if (response.status) {
          this.distritos = response.data;
        }

        this.raffle.player.district.isLoading = false;
      })
      .catch(err => {
        this.raffle.player.district.isLoading = false;

        throw err;
      })
    },

    searchLocal: function() {
      this.search();
    },
  },
}
</script>
