FROM php:8.3-cli-alpine

WORKDIR /var/www/html

RUN apk add --no-cache git unzip \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

CMD ["composer", "install"]