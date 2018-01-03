var mix = require('laravel-mix');
var rtlcss = require('rtlcss');

mix.options({
    extractVueStyles: false,
    processCssUrls: false,
    purifyCss: false,
    uglify: {},
    postCss: [rtlcss]
});
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

mix.js([
        './resources/assets/js/app.js',
        // './node_modules/X-editable/dist/bootstrap3-editable/js/bootstrap-editable.js',
    ],
    './public/js');

mix.less('resources/assets/less/app.less', 'public/css/less.css');
mix.styles([
    'public/css/less.css',
    './node_modules/toastr/build/toastr.css',
    './node_modules/X-editable/dist/bootstrap3-editable/css/bootstrap-editable.css',
    './node_modules/jquery-confirm/css/jquery-confirm.css',
], 'public/css/app.css');
mix.copy('resources/assets/fonts', 'public/fonts');
mix.copy('node_modules/font-awesome/fonts/*', 'public/fonts');

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
