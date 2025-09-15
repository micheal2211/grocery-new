const mix = require('laravel-mix');

mix.js('resources/js/ecom.js', 'public/js')
   .postCss('resources/css/ecom.css', 'public/css', [
       //
   ]);
