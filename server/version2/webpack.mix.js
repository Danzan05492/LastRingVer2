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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/assets/admin/plugins/jqvmap/jqvmap.min.css',    
    'resources/assets/admin/css/adminlte.min.css',
    'resources/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/assets/admin/plugins/daterangepicker/daterangepicker.css',
    'resources/assets/admin/plugins/summernote/summernote-bs4.min.css',

],'public/assets/admin/css/admin.css');
mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/jquery-ui/jquery-ui.min.js',
    'resources/assets/admin/js/fix.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',    
    'resources/assets/admin/plugins/chart.js/Chart.min.js',
    'resources/assets/admin/plugins/sparklines/sparkline.js',
    'resources/assets/admin/plugins/jqvmap/jquery.vmap.min.js',    
    'resources/assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js',    
    'resources/assets/admin/plugins/jquery-knob/jquery.knob.min.js',
    'resources/assets/admin/plugins/moment/moment.min.js',
    'resources/assets/admin/plugins/daterangepicker/daterangepicker.js',
    'resources/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/assets/admin/plugins/summernote/summernote-bs4.min.js',
    'resources/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/assets/admin/js/adminlte.js',    
],'public/assets/admin/js/admin.js');

mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts','public/assets/admin/webfonts');
mix.copyDirectory('resources/assets/admin/img','public/assets/admin/img');