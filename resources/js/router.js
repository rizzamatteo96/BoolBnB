import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home';
import Show from './pages/Show';
import Src from './pages/Src';
import Mappe from './pages/Mappe';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/show/:slug',
            name: 'apartment-details',
            component: Show
        },
        {
            path: '/src/:slug',
            name: 'src',
            component: Src
        },
        {
            path: '/mappe',
            name: 'mappe',
            component: Mappe
        }
    ]
});

export default router;