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
    'resources/front/css/bootstrap.css',
    'resources/front/css/animate.css',
    'resources/front/css/colors.css',
    'resources/front/css/font-awesome.min.css',
    'resources/front/css/responsive.css',
    'resources/front/style.css',
    'resources/front/css/version/marketing.css',

],'public/assets/front/css/front.css');

mix.scripts([
    'resources/front/js/jquery.min.js',
    'resources/front/js/bootstrap.min.js',
    'resources/front/js/animate.js',
    'resources/front/js/tether.min.js',
    'resources/front/js/custom.js',
    
],'public/assets/front/js/front.js');
mix.copyDirectory('resources/front/fonts','public/assets/front/fonts');
mix.copyDirectory('resources/front/images','public/assets/front/images');
mix.copyDirectory('resources/front/upload','public/assets/front/upload');