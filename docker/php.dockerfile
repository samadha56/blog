FROM php:8.1-fpm-alpine

ADD docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

ADD . /var/www/html

RUN chmod -R 775 /var/www/html/storage
RUN chmod -R 775 /var/www/html/bootstrap/cache

RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R laravel:laravel /var/www/html

# Cron job
RUN apk update && apk add --no-cache dcron
RUN echo "* * * * * cd /var/www/html && php artisan schedule:run >> /dev/null 2>&1" >> /etc/crontabs/root
RUN chmod 0644 /etc/crontabs/root