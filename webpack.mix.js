const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(['resources/js/app.js'], 'public/js/app.js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/floating-labels.scss', 'public/css')
    .options({
        processCssUrls: false
    });

