const mix = require('laravel-mix');

mix.disableNotifications();

mix
// .js([
//     './resources/js/app.js'
// ], 'js/app.js')
.ts([
    // './resources/ts/ABCFileParser/ABCFileParser.ts'
    './resources/ts/index.ts'
], 'js/index.js')
.sass('./resources/scss/app.scss', 'css/app.css')
// .copy([
//     './resources/fonts/NotoSansLatin.woff2',
//     './resources/fonts/NotoSansLatinExt.woff2'
// ], 'public')
.setPublicPath('public');
