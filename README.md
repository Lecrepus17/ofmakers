# ofmakers
<<<<<<< HEAD
sudo /opt/lampp/xampp start apache  sudo apt-get install php-mysql
=======
sudo /opt/lampp/xampp start apache

php.ini 
alterações
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo apt-get install php-curl
sudo apt-get install php8.1-xml

cd /etc/php/8.1/cli
sudo nano php.ini 


;extension=curl
;extension=xml

reinicie o apache
>>>>>>> fb5a913f59cb7be29457e250ace0aed2ff0f4f45
