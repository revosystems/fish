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
    // 'node_modules/jquery-tags-input/dist/jquery.tagsinput.js',
    // 'resources/js/libs/mention.js/bootstrap-typeahead.js',
    // 'resources/js/libs/mention.js/mention.js',
], 'public/js/app.js')

    // // WEB JS
    // .babel(['resources/js/main.js'], 'public/js/main.js')
    //
    // // WEB STYLES
    // .less('resources/less/app.less', '../resources/css/less-app.css')
    // .less('resources/less/style.less',   '../resources/css/hurricane.css')
    // .styles([
    //     'resources/css/app.css',
    //     'resources/css/less-app.css',
    // ],'public/css/app.css')
    //
    // .styles([
    //     'resources/css/hurricane.css',
    // ], 'public/css/all.css')
    //
    //
    // // PROPOSAL PDF
    // .styles(['resources/css/pdf.css'],'public/css/pdf.css')
;