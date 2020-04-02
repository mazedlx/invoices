const mix = require('laravel-mix');
const path = require('path');

mix.webpackConfig({
 resolve: {
   alias: {
     '@': path.resolve(__dirname, 'resources/js')
   }
 }
});

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
  ])
  .extract(['vue']);

if (mix.inProduction()) {
  mix.version();
}
