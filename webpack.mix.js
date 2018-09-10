let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/admin/css/bootstrap.css',
    'resources/admin/css/bootstrap-datetimepicker.min.css',
    'resources/admin/css/font-awesome.css',
    'resources/admin/css/sb-admin-2.css',
    'resources/admin/css/timeline.css',
    'resources/admin/css/custom-style.css',
     'resources/admin/css/dataTables.min.css'], 'public/assets/admin/stylesheets/styles.css', './');
mix.scripts([
    'resources/admin/js/jquery.js',
    'resources/admin/js/jquery.validate.min.js',
    'resources/admin/js/additional-methods.min.js',
    'resources/admin/js/dataTables.min.js',
    'resources/admin/js/bootstrap.js',
    'resources/admin/js/bootstrap-datetimepicker.min.js',
    'resources/admin/js/formtowizard.js',
    'resources/admin/js/common_admin.js',
    'resources/admin/js/Chart.js',
    'resources/admin/js/metisMenu.js',
    'resources/admin/js/sb-admin-2.js',
    'resources/admin/js/frontend.js',
 ], 'public/assets/scripts/admin/frontend.js', './');

mix.styles([
    'resources/web/css/bootstrap.css',
    'resources/web/css/style.css',
    'resources/web/css/responsive.css',
    'resources/web/css/all.css',
    'resources/web/css/animate.css',
    'resources/web/owlcarousel/owl.carousel.min.css',
    'resources/web/css/bootoast.css',
    'resources/admin/css/bootstrap-multiselect.css',
    'resources/web/css/owlcarousel/owl.theme.default.min.css'], 'public/assets/web/stylesheets/styles.css', './');
mix.scripts([
    'resources/web/js/jquery.min.js',
    'resources/web/js/popper.min.js',
    'resources/web/js/bootstrap.js',
    'resources/web/owlcarousel/owl.carousel.js',
    'resources/web/js/numscroller-1.0.js',
    'resources/web/js/script.js',
    'resources/web/js/bootoast.min.js',
    'resources/admin/js/bootstrap-multiselect.js',
], 'public/assets/web/scripts/frontend.js', './');