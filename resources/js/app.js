import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import Login from "./components/auth/login.vue";
import Register from "./components/auth/register.vue";
import "./Auth";

const routes = [
    {
        path: "/",
        name: "",
        component: Login,
    },
    {
        path: "/login",
        name: "",
        component: Login,
    },
    {
        path: "/register",
        name: "",
        component: Register,
    },
];
const route = createRouter({
    routes,
    history: createWebHistory(),
});

const app = createApp({
    data: () => {
        return {
            title: "",
        };
    },
}).use(route);
app.mount("#authApp");
