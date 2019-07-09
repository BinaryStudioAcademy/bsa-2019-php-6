FROM php:7.3.6-fpm-stretch

WORKDIR /app

ARG UID=1000
ARG GID=1000

RUN apt-get update && apt-get install -y \
        libjpeg62-turbo-dev \
        libpng-dev \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable xdebug

RUN addgroup --gid=$GID appuser \
    && useradd -r -u $UID -g appuser appuser \
    && mkdir -p /home/appuser \
    && chown appuser:appuser /home/appuser

RUN mkdir -p public/storage \
    && ln -s /app/storage/app/public /app/public/storage/files

USER appuser