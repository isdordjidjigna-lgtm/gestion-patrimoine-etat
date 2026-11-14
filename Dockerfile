FROM php:8.3-fpm-alpine

RUN apk add --no-cache postgresql-dev libzip-dev zip unzip git curl nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Déclarer SERVICE_DIR AVANT de l'utiliser
ARG SERVICE_DIR=services/auth-service

WORKDIR /var/www/html

COPY . .

RUN cd $SERVICE_DIR && composer install --no-interaction --no-dev --optimize-autoloader

WORKDIR /var/www/html/$SERVICE_DIR

EXPOSE 8000

CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=$PORT