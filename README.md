## ---
### Установка

Установить PHP-7.4+

Установить MySQL

Установить composer

cd /var/www/

git clone https://github.com/Udimuz/CRUD-1.git folder

cd folder

composer install

define database, APP_KEY in .env

php artisan migrate --seed

php artisan serve