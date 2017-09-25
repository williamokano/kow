FROM php:7.1.9-apache
RUN apt-get update && apt-get install -y \
    curl \
    libcurl3 \
    libssl-dev \
    unzip \
    vim \
    libmemcached-dev

RUN docker-php-ext-install -j$(nproc) pdo \
    mysqli \
    json \
    pdo_mysql \
    sockets \
    ftp \
    bcmath

RUN a2enmod rewrite
