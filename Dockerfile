FROM php:8.3-fpm-alpine

RUN apk add --no-cache postgresql-dev libzip-dev zip unzip git curl nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

ARG SERVICE_DIR
RUN cd $SERVICE_DIR && composer install --no-interaction --no-dev --optimize-autoloader

WORKDIR /var/www/html/$SERVICE_DIR

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=$PORT
