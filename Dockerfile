# Multi-stage Dockerfile für PHP-Entwicklung
FROM php:8.5-fpm-alpine AS base

# System-Abhängigkeiten installieren
RUN apk add --no-cache \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    linux-headers \
    $PHPIZE_DEPS

# PHP-Extensions installieren
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    intl \
    opcache

# Composer installieren
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Xdebug für Development installieren (optional)
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# PHP-Konfiguration für Development
RUN echo "xdebug.mode=debug,develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Development PHP.ini
RUN echo "display_errors=On" > /usr/local/etc/php/conf.d/development.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/development.ini \
    && echo "memory_limit=512M" >> /usr/local/etc/php/conf.d/development.ini \
    && echo "opcache.enable=0" >> /usr/local/etc/php/conf.d/development.ini \
    && echo "opcache.validate_timestamps=1" >> /usr/local/etc/php/conf.d/development.ini

WORKDIR /var/www/html

# Node.js Stage für Tailwind CSS
FROM node:20-alpine AS node

WORKDIR /var/www/html

# Nginx Stage
FROM nginx:alpine AS nginx

COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
