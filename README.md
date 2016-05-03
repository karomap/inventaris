# Inventaris
Simple assets managemen apps
Based on Laravel 5.2 with some additional packages
- laravelcollective/html
- laracasts/flash
- doctrine/dbal
- yajra/laravel-datatables-oracle

## Installation
1. Run composer update to install all dependencies. Composer homepage : https://getcomposer.org/
<pre>composer update</pre>
2. Create .env file from .env.example then edit the database host, port, name, user and password
3. Run database migration and seeding. This database seeding will create 2 users:
  - admin@inventaris.dev with password: admin
  - operator@inventaris.dev with password: operator
<pre>php artisan migrate --seed</pre>
4. Run npm install if you wish to use laravel elixir, then install gulp globally.
<pre>npm install //linux and mac<br>npm install --no-bin-links //windows platform<br>npm install -g gulp</pre>
5. Create a virtual host to run jQuery UI autocomplete and fonts properly.
6. If you have php_intl extension enabled, you can use NumberFormatter to replace spell function in app/Helpers.php

## Components

- Admin template : <a target="_blank" href="https://colorlib.com/wp/free-bootstrap-admin-dashboard-templates/">Gentelella</a>
- <a target="_blank" href="http://getbootstrap.com/">Bootstrap 3</a>
- <a target="_blank" href="https://nakupanda.github.io/bootstrap3-dialog/">Bootstrap 3 Dialog</a>
- <a target="_blank" href="https://jqueryui.com/">jQuery UI</a>
- <a target="_blank" href="https://github.com/eternicode/bootstrap-datepicker">Bootstrap Datepicker</a>
- <a target="_blank" href="https://sciactive.com/pnotify/">PNotify</a>
- <a target="_blank" href="http://limonte.github.io/sweetalert2/">Sweet Alert 2</a>
