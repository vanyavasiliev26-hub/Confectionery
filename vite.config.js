import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/header.css',
                'resources/css/contact.css',
                'resources/css/catalog.css',
                'resources/css/profile.css',
                'resources/css/admin.css',
                'resources/css/cart.css',
                'resources/css/product.css',
                'resources/css/about.css',
            ],
            refresh: true,
        }),
    ],
});