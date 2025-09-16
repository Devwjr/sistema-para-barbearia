
FROM php:8.2-apache

# Instalar extensões do PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip

# Ativar mod_rewrite
RUN a2enmod rewrite

# Configurar Apache para permitir .htaccess
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo "<Directory /var/www/html>" >> /etc/apache2/apache2.conf
RUN echo "    Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf
RUN echo "    AllowOverride All" >> /etc/apache2/apache2.conf
RUN echo "    Require all granted" >> /etc/apache2/apache2.conf
RUN echo "</Directory>" >> /etc/apache2/apache2.conf

# Copiar arquivos do projeto
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# Pastas extras
RUN mkdir -p /var/www/html/uploads && \
    mkdir -p /var/www/html/tmp && \
    chmod -R 777 /var/www/html/uploads && \
    chmod -R 777 /var/www/html/tmp

EXPOSE 80
CMD ["apache2-foreground"]
