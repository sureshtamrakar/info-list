import {createWebHistory,createRouter} from 'vue-router'

import List from './vue/list.vue';
import addClient from './vue/addClient.vue';
const routes = [
    {
        name : "list",
        path : "/list",
        component : List
    },
    {
        name : "home",
        path : "/",
        component : addClient
    }
];

const router = createRouter({
    history :createWebHistory(),
    routes
})

export default router;