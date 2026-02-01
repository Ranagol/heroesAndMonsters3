FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    && docker-php-ext-install zip dom mbstring xml xmlwriter

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (better caching)
COPY composer.json composer.lock ./

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-interaction --prefer-dist

# Copy project files
COPY . .

# Copy Xdebug config
COPY docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Hey Docker, this PHP will listen on port 8000, inside the container
EXPOSE 8000

# This is the command Docker runs by default when the container starts:
# php -S 0.0.0.0:8000 index.php
# This means "start the PHP built-in web server, listen on all interfaces 
CMD ["php", "-S", "0.0.0.0:8000", "index.php"]

