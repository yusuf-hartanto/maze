import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const baseRoutes = [
    {
        path: '/',
        name: 'generate',
        component: () => import(/* webpackChunkName: "group-layouts" */ './pages/Maze.vue'),
        meta: { title: 'Maze' }
    },
];

const routes = baseRoutes

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
