require("./bootstrap");

import Vue from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue";
import PortalVue from "portal-vue";

import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";

import PerfectScrollbar from 'vue2-perfect-scrollbar'
import 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css'

import store from '@/Store/index';

import money from 'v-money';

import Vue2Filters from 'vue2-filters';


// import colors from 'vuetify/lib/util/colors'

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

Vue.use(Vuetify);
Vue.use(PerfectScrollbar);
Vue.use(money, {precision: 4});


Vue.use(Vue2Filters);

const app = document.getElementById("app");

new Vue({
    store,
    vuetify: new Vuetify({
    }),
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);

// Import modules...
// import Vue from 'vue';
// import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
// import PortalVue from 'portal-vue';

// Vue.mixin({ methods: { route } });
// Vue.use(InertiaPlugin);
// Vue.use(PortalVue);

// const app = document.getElementById('app');

// new Vue({
//     render: (h) =>
//         h(InertiaApp, {
//             props: {
//                 initialPage: JSON.parse(app.dataset.page),
//                 resolveComponent: (name) => require(`./Pages/${name}`).default,
//             },
//         }),
// }).$mount(app);
