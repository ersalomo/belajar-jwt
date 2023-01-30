import Dashboard from "./home/dashboard.vue";
import Acccount from "./home/accounts.vue";
import Profile from "./home/profile.vue";
import Login from "./auth/login.vue";
import Register from "./auth/register.vue";

export const routes = [
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
