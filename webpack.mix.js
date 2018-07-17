let mix = require("laravel-mix");

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
mix.disableNotifications();
mix.webpackConfig({
  devtool: "source-map"
});
mix
  .js("resources/assets/js/app.js", "public/js")
  .js("resources/assets/js/appAdmin.js", "public/js")
  .less("resources/assets/less/app.less", "public/css")
  .less("resources/assets/less/admin/app.less", "public/css/admin").sourceMaps();