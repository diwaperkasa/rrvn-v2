// webpack.mix.js

let mix = require('laravel-mix');
require('laravel-mix-purgecss');

// Config

mix.webpackConfig({
    stats: {
        children: true
    }
});

// CSS

mix.
    sass('assets/styles/style.scss', 'style.css', {
        sassOptions: {
            outputStyle: 'compressed'
        }
    })
    .options({
        processCssUrls: false
    })
    .purgeCss({
        content: [
            '*.php',
        ],
        safelist: {
            standard: [
                /^text-/,
                /^bg-/,
                /^visible-/,
                /^hidden-/,
                /^btn/,
            ]
        }
    });

// JS

mix
    .js([          
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/sharer.js/sharer.min.js',
        'assets/scripts/scripts.js',
    ], 'js/scripts.min.js');