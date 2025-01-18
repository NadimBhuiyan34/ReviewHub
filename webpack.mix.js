mix.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
   .sass('resources/sass/app.scss', 'public/css')
   .options({
       processCssUrls: false,
   });
