import './assets/main.css'

import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'

import App from './App.vue'
import Products from "@/views/Products.vue";
import FootballClubs from "@/views/FootballClubs.vue";

const routes = [
    { path: '/:locale(en|sr)/product', name: 'products', component: Products },
    { path: '/:locale(en|sr)/football/clubs', name: 'football_clubs', component: FootballClubs },
]

const router = createRouter({
    history: createWebHistory(),
    routes,

})

createApp(App)
    .use(router)
    .mount('#app')