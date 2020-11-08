const mix = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    output: {
    chunkFilename: '[name].js?id=[chunkhash]',
    },
    resolve: {
        modules: [
            path.resolve(__dirname, 'vendor/laravel/spark-aurelius/resources/assets/js'),
            'node_modules',
        ],
        alias: {
            'vue$': mix.inProduction() ? 'vue/dist/vue.min' : 'vue/dist/vue.js',
            '@': path.resolve(__dirname, './resources/js/'),
        },
        extensions: ['.js', '.vue', '.scss', '.sass'],
    }
}).options({
    hmrOptions: {
        host: process.env.APP_URL.split('//')[1],
        port: '8080'
    },
    processCssUrls: false,
    postCss: [
        require('autoprefixer')({
            cascade: false
        })
    ]
});
