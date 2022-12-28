import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/backend/style.scss',
                'resources/sass/backend/style.dark.scss',
                'resources/js/backend/app.js',
                // 'resources/sass/frontend/style.scss',
                // 'resources/js/frontend/theme.js',
                'resources/sass/errors.scss',
                'resources/js/errors.js',
                'resources/js/backend/modules/plugins.js'
            ],
            refresh: true,
        }),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'update',
                        path: '*',
                    });
                }
            },
        },

    ],
    resolve: {
        alias: {
            '$':  'jQuery',
        },
    },
});
