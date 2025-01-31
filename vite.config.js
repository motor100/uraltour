import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                // 'resources/js/app.js',
                'resources/sass/main.scss',
                'resources/sass/dashboard.scss',
                'resources/js/main.js',
                'resources/js/dashboard.js',
                'resources/js/editor.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern',
                additionalData: '@use "_config.scss" as *;'
            }
        }
    },
});