import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "resource/**"
                // "resources/js/homeApp.js",
                // "resources/css/app.css",
                "resources/js/app.js",
                // "resources/js/bootstrap.js",
                // "public/map-leaflet.js",
            ],
            refresh: true,
        }),
    ],
});

