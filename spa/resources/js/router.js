import Vue from 'vue';
import VueRouter from 'vue-router';

import index from './src/pages/index.vue';
import createForm from './src/pages/create-form.vue';
import edit from './src/pages/update.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: index,
        },
        {
            path: '/create-form',
            name: 'create-form',
            component: createForm
        },
        {
            path: '/edit/:id',
            name: 'edit',
            component: edit
        },
    ]
});

export default router;