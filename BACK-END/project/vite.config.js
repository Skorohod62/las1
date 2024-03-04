import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/itc-slider.css',
                'resources/css/kartohka.css',
                'resources/css/katalog.css',
                'resources/css/korzina.css',
                'resources/css/style.css',
                'resources/css/styles.css',
                'resources/css/components/card-style.css',
                'resources/css/components/form-style.css',
                'resources/css/components/zero.css',
                'resources/css/components/index.css',

                'resources/js/bootstrap.js',
                'resources/js/code.js',
                'resources/js/itc-slider.js',
                'resources/js/kartohka.js',
                'resources/js/korzina.js',
                'resources/js/script.js',
                'resources/js/scripts.js',
                'resources/js/scriptburg.js',
                'resources/js/zagruz.js',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
