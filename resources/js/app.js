import { createApp } from "vue";
import Header from "./components/layouts/header.vue";
import SideBar from "./components/layouts/side-bar.vue";
import route from "./components/routes";
// import "./Auth";

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
