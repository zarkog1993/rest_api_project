import './assets/main.css'

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'

import App from './App.vue'
import HelloWorld from "@/components/HelloWorld.vue";
import WelcomeItem from "@/components/WelcomeItem.vue";
import Products from "@/views/Products.vue";

const routes = [
    { path: '/:locale(en|sr)', component: Products },
    { path: '/hello-world', component: HelloWorld },
    { path: '/welcome-item', component: WelcomeItem },
]

const router = createRouter({
    history: createWebHistory(),
    routes,

})

createApp(App)
    .use(router)
    .mount('#app')