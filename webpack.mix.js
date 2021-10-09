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

mix.js('resources/js/app.js', 'public/js').vue().postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]).sass('resources/sass/app.scss', 'public/css');;


// mix.webpackConfig({
//     mode: "development",
//     devtool: "inline-source-map",
//     devServer: {
//         headers: {
//             'Access-Control-Allow-Origin': '*'
//         },
//     },
// });



mix.options({
    hmrOptions: {
        host: 'consultswap.local',  // site's host name
        port: 18090,
    }
});

