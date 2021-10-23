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

mix.js('resources/js/app.js', 'public/js')
    .vue();

mix.browserSync('https://e0b7-180-252-88-121.ap.ngrok.io');

mix.js('node_modules/videojs-youtube/dist/Youtube.min.js', 'public/js');
mix.js('node_modules/video.js/dist/video.min.js', 'public/js');
mix.js('node_modules/video.js/dist/video-js.min.css', 'public/css');
