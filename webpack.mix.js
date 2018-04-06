const { mix } = require('laravel-mix');

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
	.js('resources/assets/js/admin.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
   	.sass('resources/assets/sass/admin.scss', 'public/css')
   	.sass('resources/assets/sass/timeline.scss', 'public/css');

mix.js('resources/assets/js/frontend/medicio/app.js', 'public/frontend/medicio/js')
	.sass('resources/assets/sass/frontend/medicio_app.scss', 'public/frontend/medicio/css');

mix.copy('node_modules/chart.js/Chart.js', 'public/js')
	.copy('resources/assets/js/vendor/dropzone.js', 'public/js/vendor')
	.copy('node_modules/owl.carousel/src/js/owl.carousel.js', 'public/frontend/medicio/js');
