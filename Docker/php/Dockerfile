FROM devilbox/php-fpm-8.2

RUN pecl install redis && \
    echo "extension=redis.so" > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
