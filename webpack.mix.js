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
    'public/plugins/daterangepicker/daterangepicker.css',
    'public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
    'public/plugins/select2/css/select2.min.css',
    'public/css/jquery-confirm.min.css',
    'public/css/waitMe.css',
    'public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
], 'public/css/vendors.css')

mix.combine([
    'public/plugins/jquery/jquery.min.js',
    'public/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/plugins/moment/moment.min.js',
    'public/plugins/daterangepicker/daterangepicker.js',
    'public/plugins/sweetalert2/sweetalert2.min.js',
    'public/js/jquery-confirm.min.js',
    'public/js/waitMe.js',
    'public/plugins/select2/js/select2.full.min.js',
    'public/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
    'public/js/init-plugins.js',
], 'public/js/vendors.js')
