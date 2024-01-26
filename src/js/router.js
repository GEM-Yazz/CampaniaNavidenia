import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router)

export default new Router({
  scrollBehavior() {
    return { x: 0, y: 0 };
  },
  mode: 'history',
  routes: [
    { 
      path: '/',
      component: () => import(/* webpackChunkName: "home-q92myJ" */'./views/Home.vue'),
      name: 'home',
    },
    {
      path: '*',
      component: () => import(/* webpackChunkName: "error404" */'./views/404.vue'),
      name: '404',
    },
  ],
})
