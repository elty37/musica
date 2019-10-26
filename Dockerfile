FROM php:7.2.1-apache
COPY php.ini /usr/local/etc/php/
RUN echo "deb http://deb.debian.org/debian stretch main" > /etc/apt/sources.list \
    echo "deb http://security.debian.org/debian-security stretch/updates main" >> /etc/apt/sources.list \
    echo "deb http://deb.debian.org/debian stretch-updates main" >> /etc/apt/sources.list
RUN echo  nameserver 8.8.8.8 >> /etc/resolv.conf
RUN echo  nameserver 8.8.4.4 >> /etc/resolv.conf
RUN a2enmod rewrite
RUN apt-get update
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev && \
docker-php-ext-install pdo_mysql mysqli mbstring gd iconv
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN mkdir -p /var/log/logdir
RUN chmod 777 /var/log/logdir
RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
    && chmod +x mhsendmail_linux_amd64 \
    && mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail \
    && echo 'sendmail_path = "/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' > /usr/local/etc/php/conf.d/sendmail.ini
EXPOSE 8000
