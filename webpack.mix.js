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

mix.combine([
    'public/css/bootstrap.css',
    'public/css/style.css',
    'public/css/custom.css',
    'public/css/responsive.css',
], 'public/css/app.css')
    .combine([
        'public/js/jquery.min.js',
        'public/js/popper.min.js',
        'public/js/bootstrap.js',
        'public/js/jquery-scrolltofixed-min.js',
        'public/js/scripts.js',
    ], 'public/js/app.js')
    .version();;
