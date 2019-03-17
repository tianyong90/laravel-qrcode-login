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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.extract(['vue', 'axios'])

mix.browserSync({
   proxy: 'laravel-scan-login.test/',
   // startPath: '',
   open: false,
   reloadOnRestart: true,
   watchOptions: {
      usePolling: true
   },
   files: [
      'app/**/*.php',
      'resources/views/**/*.php',
      'public/js/**/*.js',
      'public/css/**/*.css',
      'resources/lang/**/*.php',
      'resources/lang/**/*.json',
   ]
})