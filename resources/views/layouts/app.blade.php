<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Inventaris</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    @stack('styles')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

      @include('layouts._sidebar')

      @include('layouts._topnav')

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('title')</h3>
              </div>
              <div class="pull-right">
                @yield('header-kanan')
              </div>
            </div>
            <div class="clearfix"></div>
            <hr style="margin-top: 0">

            @yield('content')

        </div>
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

    @if (Session::has('flash_notification.message'))
    <script type="text/javascript">
      new PNotify({
          title: "{{ Session::get('flash_notification.level') == 'success' ? 'Sukses!' : 'Error!' }}",
          text: '{{ Session::get('flash_notification.message') }}',
          type: '{{ Session::get('flash_notification.level') }}',
          styling: 'bootstrap3'
      });

      swal({
        title: "{{ Session::get('flash_notification.level') == 'success' ? 'Sukses!' : 'Error!' }}",
        text: '{{ Session::get('flash_notification.message') }}',
        type: '{{ Session::get('flash_notification.level') }}',
        timer: 5000,
        showCloseButton: true,
        showConfirmButton: false,
      });
    </script>
    @endif

    @if($errors->any())
    <script type="text/javascript">
        new PNotify({
            title: 'Error!',
            text: '@foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach',
            type: 'error',
            styling: 'bootstrap3'
        });
    </script>
    @endif

    @stack('scripts')
  </body>
</html>