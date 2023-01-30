import Dashboard from "./home/dashboard.vue";
import Acccount from "./home/accounts.vue";
import Profile from "./home/profile.vue";
import Login from "./auth/login.vue";
import Register from "./auth/register.vue";
import Home from "./home/home.vue";
import { createRouter, createWebHistory } from "vue-router";

export const routes = [
    {
        path: "/home",
        name: "",
        component: Home,
        children: [
            {
                path: "/accounts",
                component: async () => await Acccount,
            },
            {
                path: "/dashboard",
                component: async () => await Dashboard,
            },
        ],
    },
    {
        path: "/profile",
        name: "",
        component: Profile,
    },
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

export default route;
