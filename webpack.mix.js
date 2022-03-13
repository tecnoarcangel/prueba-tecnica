const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/grapesjs/dist/css/grapes.min.css','public/css/grapes.min.css')
    .copy('node_modules/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css','public/css/grapesjs-preset-webpage.min.css')
    .copy('node_modules/grapesjs/dist/grapes.min.js','public/js/grapes.min.js')
    .copy('node_modules/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js','public/js/grapesjs-preset-webpage.min.js')
    .copy('node_modules/grapesjs/dist/grapes.min.js.map','public/js/grapes.min.js.map')
    .copyDirectory('node_modules/grapesjs/dist/fonts','public/fonts')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
