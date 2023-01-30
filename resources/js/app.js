import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import Header from "./components/layouts/header.vue";
import SideBar from "./components/layouts/side-bar.vue";
import { routes } from "./components/routes";
// import "./Auth";

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
app.mount("#authApp");
