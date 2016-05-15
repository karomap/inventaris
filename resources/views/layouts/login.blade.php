<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMAS</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

  </head>

  <body style="background:#F7F7F7;">
    <div>
      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">

            @yield('content')

          </section>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/core.js') }}"></script>
  </body>
</html>