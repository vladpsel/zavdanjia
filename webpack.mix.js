let mix = require('laravel-mix');

mix.sass('resources/sass/style.sass', 'public/dist/css/style.css')
   .setPublicPath('public');

