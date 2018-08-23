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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.scripts([
		'public/js/jquery.min.js',
		'public/js/bootstrap.min.js',
		'public/toastr/toastr.min.js',
		'public/js/notifications.js',
		'public/js/main.js'
	], 
	'public/js/app.js')
	.scripts([
		'public/assets/js/core/jquery.3.2.1.min.js',
		'public/assets/js/core/popper.min.js',
		'public/assets/js/core/bootstrap.min.js',
		'public/assets/js/light-bootstrap-dashboard.js',
		'public/assets/js/plugins/chart.min.js',
		'public/assets/js/chart.js',
	], 
		'public/assets/js/app.js')
   .styles([
   		'public/css/bootstrap.min.css',
   		'public/css/font-awesome.min.css',
   		'public/toastr/toastr.min.css',
   		'public/css/style.css'
   	], 
   		'public/css/app.css')
    .styles([
   		'public/assets/css/bootstrap.min.css',
   		'public/assets/css/light-bootstrap-dashboard.css',
   	], 
   		'public/assets/css/app.css');
