import Vue from 'vue';
import VueRouter from 'vue-router';

import index from './src/pages/index.vue';
import createForm from './src/pages/create-form.vue';
import edit from './src/pages/update.vue';
// import login from './src/pages/login.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',   
        component: index,
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('./src/pages/masuk.vue'),
        
    },
    {
        path: '/create-form',
        name: 'create-form',
        component: createForm,
    },
    {
        path: '/edit/:id',
        name: 'edit',
        component: edit,
    },
]

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;