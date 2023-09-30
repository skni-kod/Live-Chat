import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/live-chat.js',
                'resources/js/support-chat.js',
                'resources/js/test_usage.js',
            ],
            refresh: true,
        }),
    ],
});
