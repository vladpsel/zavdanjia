let mix = require('laravel-mix');

mix.sass('resources/sass/style.sass', 'public/dist/css/style.css')
    .copy('resources/img', 'public/dist/img')
   .setPublicPath('public');

