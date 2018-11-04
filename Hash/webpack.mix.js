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
mix.webpackConfig({devtool: "source-map"});
mix.styles([
	'resources/css/global.css',
	'node_modules/jquery-typeahead/src/jquery.typeahead.css'
], 'public/css/all.css');
mix.copyDirectory('resources/svg', 'public/svg');
mix.copyDirectory('resources/img', 'public/img');
mix.js('resources/js/feed.js', 'public/js');
mix.js('resources/js/hash.js', 'public/js');
mix.js('resources/js/app.js', 'public/js')
	.extract(["jquery", "popper.js", "bootstrap", "socket.io-client", "laravel-echo", "jquery-typeahead", "mustache"]);
