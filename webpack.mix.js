const mix = require('laravel-mix');

mix
    // ADMIN
    .babel([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'vendor/badchoice/thrust/src/resources/js/thrust.min.js',
        'node_modules/jquery-tags-input/dist/jquery.tagsinput.js',
        'resources/assets/js/admin.js',
        'resources/assets/js/libs/mention.js/bootstrap-typeahead.js',
        'resources/assets/js/libs/mention.js/mention.js',
    ], 'public/js/admin.js')

    //.less('resources/assets/less/style.less', '../resources/assets/css/style.css')
    .sass('resources/assets/sass/admin.scss', 'public/css/admin.css')

    // WEB
    .babel([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/imagesloaded/imagesloaded.pkgd.js',
        //'node_modules/bootstrap-sass/javascripts/bootstrap.js',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'node_modules/bootstrap-select/dist/js/bootstrap-select.js',
        'public/modules/gridder/dist/js/jquery.gridder.min.js',
        'public/modules/Animated-Placeholder/js/animated-placeholder.js',
        'resources/assets/js/app.js',
    ], 'public/js/app.js')

    .sass('resources/assets/sass/app.scss', '../resources/assets/css/app-sass.css')
    .styles([
        'resources/assets/css/app-sass.css',
        'node_modules/bootstrap-select/dist/css/bootstrap-select.css',
        'public/modules/gridder/dist/css/jquery.gridder.min.css',
        'resources/assets/css/app.css',
    ],'public/css/app.css')

    // PROPOSAL PDF
    .styles(['resources/assets/css/pdf.css'], 'public/css/pdf.css')
;