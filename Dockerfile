FROM php:8.2-cli

# Install system dependencies (added libpq-dev for Postgres)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    zip unzip git curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Step 1: Copy only dependency files first (Leverages Docker Caching)
COPY composer.json composer.lock ./

# Step 2: Install dependencies with low-memory footprint flags
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-scripts

# Step 3: Copy remaining application code
COPY . .

# Step 4: Run autoloader dump and storage link
RUN composer dump-autoload --optimize --no-dev
RUN php artisan storage:link || true

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Bind to Render's dynamic PORT
ENV PORT=8080
EXPOSE ${PORT}

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}