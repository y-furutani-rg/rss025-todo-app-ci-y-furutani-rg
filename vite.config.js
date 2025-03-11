import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            vue(),
            // tailwindcss(),
        ],
        server: {
            host: '0.0.0.0',
            cors: true,
            origin: `http://${env.VITE_HMR_HOST || 'localhost'}:5173`,
            hmr: {
                host: env.VITE_HMR_HOST || 'localhost',
            }
        }
    }
});
