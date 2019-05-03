FROM php:7.2.1-apache
COPY php.ini /usr/local/etc/php/
RUN a2enmod rewrite
RUN apt-get update
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev && \
docker-php-ext-install pdo_mysql mysqli mbstring gd iconv
RUN mkdir -p /var/log/logdir
RUN chmod 777 /var/log/logdir
EXPOSE 80
