const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/app.js', 'public/js')
.postCss('resources/css/app.css', 'public/css', [
   require('tailwindcss'),
 ])

 mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js')
    }
  }
 });