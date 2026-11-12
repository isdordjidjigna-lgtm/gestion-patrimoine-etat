FROM php:8.3-fpm-alpine
RUN apk add --no-cache postgresql-dev libzip-dev zip unzip git curl nodejs npm
RUN docker-php-ext-install pdo pdo_pgsql zip bcmath
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-interaction --no-dev --optimize-autoloader
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
