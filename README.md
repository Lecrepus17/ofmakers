# ofmakers
ssh -L 3307:localhost:3306 ofmakers@192.168.101.55
sudo /opt/lampp/xampp start apache  
https://pt.scribd.com/presentation/402567686/Diagrama-MVC-Laravel
php artisan vendor:publish --tag=laravel-pagination

composer require realrashid/sweet-alert

php artisan vendor:publish --provider="RealRashid\SweetAlert\SweetAlertServiceProvider"

sudo apt-get install php-mysql

botão delete composer require realrashid/sweet-alert

php.ini 
alterações
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo apt-get install php-curl
sudo apt-get install php8.1-xml
""'''
cd /etc/php/8.1/cli
sudo nano php.ini 


;extension=curl
;extension=xml

reinicie o apache

php artisan migrate:rollback
php artisan migrate --seed

php artisan serve --host=192.168.1.49





para nomear um ip na maquina local

sudo nano /etc/hosts 

colocar ip e o nome
192.168.0.250  ofmakers


como fazer um ip estático num rasp

sudo nano /etc/dhcpcd.conf
static ip_address=192.168.0.250/16
