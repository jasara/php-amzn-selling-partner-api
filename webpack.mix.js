const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.js('source/_assets/js/main.js', 'js')
    .css('source/_assets/css/main.css', 'css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nested'),
    ])
    .jigsaw({
        watch: ['config.php', 'navigation.php', 'source/**/*.md', 'source/**/*.php', 'source/**/*.scss', 'source/_data/**/*.json'],
    })
    .options({
        processCssUrls: false,
    })
    .sourceMaps()
    .version();
