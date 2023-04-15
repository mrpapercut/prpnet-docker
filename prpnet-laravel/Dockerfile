FROM php:8.2.4-fpm-bullseye

WORKDIR /var/www

COPY ./composer.json ./

RUN apt-get update && apt-get install -y \
    build-essential locales zip git curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql

COPY ./composer.php ./

RUN php -e ./composer.php --install-dir=/usr/local/bin --filename=composer

RUN rm ./composer.php

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY ./ ./

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000

CMD ["php-fpm"]
