const { mix } = require('laravel-mix');

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
mix.js('resources/assets/js/app.js', 'public/js')
    .styles('resources/assets/css/dropzone.css', 'public/css/dropzone.css')
    .styles('node_modules/summernote/dist/summernote.css', 'public/css/summernote.css')
    .copy('node_modules/summernote/dist/summernote.js', 'public/js/summernote.js')
    .copyDirectory('node_modules/summernote/dist/font', 'public/css/font/')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css/admin.css')
    .browserSync({
        proxy: 'localhost',
        ghostMode: false,
        notify: false,
        open: false,
        files: [
            'app/**/*',
            'resources/views/**/*',
            'public/css/app.css',
            'public/js/app.js',
        ]
    });
