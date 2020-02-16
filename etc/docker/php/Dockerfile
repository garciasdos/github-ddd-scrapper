FROM php:7.4-fpm-alpine

WORKDIR /var/www/app

RUN apk add bash

# intl
RUN apk add --quiet zlib-dev icu-dev g++
RUN docker-php-ext-install intl && docker-php-ext-enable intl

# apcu
RUN apk add --quiet autoconf make git
RUN docker-php-ext-enable opcache

# short_open_tags
RUN touch /usr/local/etc/php/conf.d/short_open_tag.ini \
    && echo "short_open_tag=Off" >> /usr/local/etc/php/conf.d/short_open_tag.ini

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer
