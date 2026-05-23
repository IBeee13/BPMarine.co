import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    build: {
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
                passes: 2,
            },
            mangle: true,
        },

        cssMinify: true,

        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules/alpinejs')) {
                        return 'alpine';
                    }
                    if (id.includes('node_modules/aos')) {
                        return 'aos';
                    }
                },
            },
        },

        chunkSizeWarningLimit: 500,
    },
});