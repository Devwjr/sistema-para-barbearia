<<<<<<< HEAD
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY public/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

=======

FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_sqlite
COPY . /var/www/html/

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
>>>>>>> d98973d (Atualizando com nova versão do sistema da barbearia)
EXPOSE 80
