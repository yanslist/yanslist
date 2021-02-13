require('./bootstrap');

import {App, plugin} from '@inertiajs/inertia-vue';
import Vue from 'vue';
import {InertiaProgress} from '@inertiajs/progress';
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

InertiaProgress.init();

Vue.use(plugin);

// ziggy route
Vue.mixin({methods: {route}});

UIkit.use(Icons);
window.UIkit = UIkit;
Vue.prototype.$uikit = UIkit

// laravel to vue translation
Vue.prototype.translate = require('./VueTranslation/Translation').default.translate;

// global components
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
