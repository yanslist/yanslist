/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import {App, plugin} from '@inertiajs/inertia-vue';
import Vue from 'vue';

import {InertiaProgress} from '@inertiajs/progress';

InertiaProgress.init();

Vue.use(plugin);
Vue.mixin({methods: {route}});

Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const el = document.getElementById('app');
new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default
    },
  }),
}).$mount(el);
