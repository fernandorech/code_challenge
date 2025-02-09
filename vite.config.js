import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        cors: true, // Habilita CORS no servidor do Vite
        hmr: {
            host: 'localhost',
            protocol: 'ws',
        },
        watch: {
            usePolling: true, // Necessário para sistemas de arquivos dentro do Docker
        },
        /* proxy: {
            '/api': {
              target: 'http://0.0.0.0',
              changeOrigin: true,
              secure: false,
            },
        }, */
    },
});
