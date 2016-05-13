<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventaris</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    <style type="text/css">
      .col-md-3.left_col {
        position: fixed !important;
      }
      input[type=number]::-webkit-outer-spin-button,
      input[type=number]::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }

      input[type=number] {
          -moz-appearance:textfield;
      }
    </style>

    <script>
      var nw = require('nw.gui');
      var win = nw.Window.get();
    </script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

      @include('layouts._sidebar')

      @include('layouts._topnav')

        <!-- page content -->
        <div class="right_col" role="main"></div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Aplikasi Inventaris v1.0
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="{{ asset('js/core.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
      $(document).ready(function(){
        win.maximize();
      });
    </script>
  </body>
</html>