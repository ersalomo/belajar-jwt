import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "resource/**"
                // "resources/js/app.js",
                // "resources/sass/app.scss",
                "resources/js/face-recognition.js",
            ],
            refresh: true,
        }),
    ],
});

