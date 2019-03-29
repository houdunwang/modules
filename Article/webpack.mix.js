const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'modules/article/js/app.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'modules/article/css/app.css');

mix.copyDirectory(__dirname + '/Resources/assets/images', '../../public/modules/article/images');

if (mix.inProduction()) {
    mix.version();
}