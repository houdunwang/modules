const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'modules/document/js/app.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'modules/document/css/app.css');

mix.copyDirectory(__dirname + '/Resources/assets/images', '../../public/modules/document/images');

if (mix.inProduction()) {
    mix.version();
}