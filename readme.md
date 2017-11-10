<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Vue.png"></p>


<div align="center">
<p>Clone project</p>
<p>Go to the folder application using cd</p>
<p>Run <code>composer install on your cmd or terminal</code></p>
<p>Run <code>npm install</code></p>
<p>Copy .env.example file to .env on root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal Ubuntu</p>
<p>Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. </p>
<p>By default, username is root and you can leave password field empty. (This is for Xampp) </p>
<p>By default, username is root and password is also root. (This is for Lamp)</p>
<p>Run <code>php artisan key:generate</code></p>
<p>Run <code>php atisan migrate</code></p>
<p>Run <code>crontab -e</code> and add <code>* * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1</code></p>
<p>Run <code>php artisan serve</code></p>
</div>
