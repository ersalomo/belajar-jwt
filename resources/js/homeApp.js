import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import Dashboard from "./components/home/dashboard.vue";
import Acccount from "./components/home/accounts.vue";
import Profile from "./components/home/profile.vue";
import Header from "./components/layouts/header.vue";
import SideBar from "./components/layouts/side-bar.vue";

const routes = [
    {
        path: "/home",
        name: "",
        component: Dashboard,
    },
    {
        path: "/accounts",
        name: "",
        component: Acccount,
    },
    {
        path: "/profile",
        name: "",
        component: Profile,
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
app.component("header-bar", Header);
app.component("side-bar", SideBar);
app.mount("#homeApp");
