const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'modules/edu/js/app.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'modules/edu/css/app.css');

mix.copyDirectory(__dirname + '/Resources/assets/images', '../../public/modules/edu/images');

if (mix.inProduction()) {
    mix.version();
}