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

mix.js('node_modules/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js', 'js/jquery.min.js');
mix.js('node_modules/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js', 'js/bootstrap.bundle.min.js');
mix.js('node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js', 'js/jquery-easing.min.js');
mix.js('node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.min.js', 'js/sb-admin-2.min.js');
mix.js('node_modules/startbootstrap-sb-admin-2/vendor/chart.js/Chart.min.js', 'js/Chart.min.js');
mix.js('node_modules/startbootstrap-sb-admin-2/js/demo/chart-area-demo.js', 'js/chart-area-demo.js');
mix.js('node_modules/startbootstrap-sb-admin-2/js/demo/chart-pie-demo.js', 'js/chart-pie-demo.js');


mix.css('node_modules/startbootstrap-sb-admin-2/css/sb-admin-2.min.css', 'css/sb-admin-2.min.css');
mix.css('node_modules/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css', 'css/all.min.css');
