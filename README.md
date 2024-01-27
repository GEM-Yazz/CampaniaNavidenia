##  Descripción:
Este proyecto consistió en la creación de una landing page para la campaña navideña de LG, con el objetivo de guiar a los usuarios a través de un formulario para descubrir el regalo 
ideal según sus preferencias. Aunque mi participación en las interacciones fue limitada, centré mi atención en la parte visual y la maquetación para garantizar una experiencia atractiva
y fácil de seguir.

El principal objetivo fue que los usuarios tuvieran una experiencia personalizada al usar un formulario interactivo. Este formulario les ayuda a encontrar el regalo perfecto según sus gustos.


##  Setup:

1. Clone **`.env.example`** to **`.env`**
2. Change **`APP_ENV`** by **`dev`**
3. Update permalinks on Wordpress removing the last slash

##  Plugins:

- ACF
##  Packages:

- jquery

- vue

- foundation-sites

- @fancyapps/fancybox

- swiper

##  Icons:

1. Check ``fontello-cli`` as local dependence:

```sh
npx fontello-cli --version
```

2.  List all existing icon fonts

```
$ npx fontello-cli open
```

3.  Add new icons or remove some
4.  Download **config.json** within theme (should replace the last)
5.  Install the new icons (actually this install all icons again)

```
$ npm run font:install
```

6.  Edit the fonts' route within **style/commons/fontello.css**

##  NPM Scripts:

* For Development

````bash
$ npm run start

````
* For Production

````bash
$ npm run build

````
* Install fonts

````bash
$ npm run font:install

````
