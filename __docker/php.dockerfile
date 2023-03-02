FROM php:8.2-apache

WORKDIR /var/www/html

COPY apache/000-default.conf /etc/apache2/sites-enabled/000-default.conf

RUN apt-get update && \
    docker-php-ext-install pdo pdo_mysql 

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
a2enmod rewrite && \
service apache2 restart
