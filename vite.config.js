import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/ecom.js'],
             input: ['resources/js/dash.js'],
             input: ['resources/js/check.js'],
            refresh: true,
        }),
    ],
});

