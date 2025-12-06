FROM php:8.2-apache

# Install system dependencies for PostgreSQL and Composer
RUN apt-get update && apt-get install -y libpq-dev unzip git

# Install PHP extensions
RUN docker-php-ext-install mysqli pgsql pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install PHP dependencies (skip if composer.json doesn't exist or fails)
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-interaction || true; fi
