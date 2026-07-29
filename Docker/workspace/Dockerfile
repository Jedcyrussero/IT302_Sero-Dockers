FROM devilbox/php-fpm-8.2

RUN apt-get update && apt-get install -y \
    git \
    curl \
    wget \
    unzip \
    zip \
    nano \
    vim \
    nodejs \
    npm \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["tail", "-f", "/dev/null"]
