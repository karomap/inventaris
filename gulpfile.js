var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass('app.scss')
    .styles([
      'custom.css','app.css', '../plugins/bootstrap-dialog.css', '../plugins/pnotify.css',
      '../plugins/pnotify.buttons.css', '../plugins/sweetalert2.css', '../plugins/bootstrap-datepicker3.css',
      '../plugins/daterangepicker/daterangepicker.css'], 'public/css/custom.css')
    .scripts(['jquery.js', 'jquery-ui.js', 'bootstrap.js'], 'public/js/core.js')
    .scripts(['../plugins/fastclick.js', '../plugins/nprogress.js', '../plugins/bootstrap-dialog.js',
      '../plugins/pnotify.js', '../plugins/pnotify.buttons.js', '../plugins/sweetalert2.min.js',
      '../plugins/promise.js', '../plugins/bootstrap-datepicker.js', '../plugins/bootstrap-datepicker.id.min.js'], 'public/js/plugins.js')
    .scripts(['custom.js', 'app.js'], 'public/js/custom.js')
    .scripts('input.js', 'public/js/input.js')
    .scripts(['index.js', '../plugins/daterangepicker/moment.js', '../plugins/daterangepicker/daterangepicker.js'], 'public/js/index.js')
    .scripts('jquery-print.js', 'public/js/jquery-print.js')
    .copy('resources/assets/fonts', 'public/fonts')
    .copy('resources/assets/images', 'public/images');
});
