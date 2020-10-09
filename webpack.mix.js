const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/toast-notification.js', 'public/js');

const tailwindcss = require('tailwindcss');

mix.sass('resources/sass/toast-notification.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [
            tailwindcss('tailwind.config.js')
        ],
    });