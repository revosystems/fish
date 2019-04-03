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

mix.babel([
    'vendor/badchoice/thrust/src/resources/js/thrust.min.js',
    'node_modules/jquery-tags-input/dist/jquery.tagsinput.js',
    'resources/assets/js/libs/mention.js/bootstrap-typeahead.js',
    'resources/assets/js/libs/mention.js/mention.js',
], 'public/js/app.js')

    // WEB JS
    .babel(['resources/assets/js/main.js'], 'public/js/main.js')

    // WEB STYLES
    .less('resources/assets/less/app.less', '../resources/assets/css/less-app.css')
    .less('resources/assets/less/style.less', '../resources/assets/css/style.css')
    .styles([
        'resources/assets/css/app.css',
        'resources/assets/css/less-app.css',
    ],'public/css/app.css')
    .styles([
        'resources/assets/css/thrust.css',
        'resources/assets/css/libs/jquery.tagsinput.min.css',
        'resources/assets/css/style.css'
    ], 'public/css/all.css')


    // PROPOSAL PDF
    .styles(['resources/assets/css/pdf.css'], 'public/css/pdf.css')
;