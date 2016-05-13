<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'sans-serif';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('content')
                <br><br>
                <h3><a href="{{ url('/') }}">Kembali ke Halaman Utama</a></h3>
            </div>
        </div>
    </body>
</html>
