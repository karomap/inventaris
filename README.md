# Inventaris
Simple assets managemen apps 

# Installation
1. Run composer update to install all dependencies. Composer homepage : https://getcomposer.org/
<pre>composer update</pre>
2. Create .env file from .env.example then edit the database host, port, name, user and password
3. Run database migration and seeding. This database seeding will create 2 users:
<ul><li>admin@inventaris.dev with password: admin</li><li>operator@inventaris.dev with password: operator</li></ul>
<pre>php artisan migrate --seed</pre>
4. Run npm install if you wish to use laravel elixir, then install gulp globally.
<pre>npm install //linux and mac<br>npm install --no-bin-links //windows platform<br>npm install -g gulp</pre>
5. Create a virtual host to run jQuery UI autocomplete and fonts properly.
6. If you have php_intl extension enabled, you can use NumberFormatter to replace spell function in App\Helper.php

# Components
<ul>
<li>Admin template : <a target="_blank" href="https://colorlib.com/wp/free-bootstrap-admin-dashboard-templates/">Gentelella</a></li>
<li><a target="_blank" href="http://getbootstrap.com/">Bootstrap 3</a></li>
<li><a target="_blank" href="https://nakupanda.github.io/bootstrap3-dialog/">Bootstrap 3 Dialog</a></li>
<li><a target="_blank" href="https://jqueryui.com/">jQuery UI</a></li>
<li><a target="_blank" href="https://github.com/eternicode/bootstrap-datepicker">Bootstrap Datepicker</a></li>
<li><a target="_blank" href="https://sciactive.com/pnotify/">PNotify</a></li>
<li><a target="_blank" href="http://limonte.github.io/sweetalert2/">Sweet Alert 2</a></li>
</ul>
