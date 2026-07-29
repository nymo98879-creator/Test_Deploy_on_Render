FROM php:8.2-fpm

# Install system dependencies including libzip-dev
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip unzip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Prevent Composer memory limit issues
ENV COMPOSER_MEMORY_LIMIT=-1

COPY . .

# Run composer install with no-scripts first to save RAM
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create storage link for uploaded images
RUN php artisan storage:link || true

# Set storage permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Bind to Render's dynamic PORT (defaults to 8080 if not set)
ENV PORT=8080
EXPOSE ${PORT}

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}