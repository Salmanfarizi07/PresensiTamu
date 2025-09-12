# Use official PHP with Apache (simple and works for most Laravel apps)
FROM php:8.2-apache

# Set working dir
WORKDIR /var/www/html

# Install system deps required for common PHP extensions and composer
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    curl \
  && rm -rf /var/lib/apt/lists/*

# Install PHP extensions commonly required by Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) pdo_mysql zip gd mbstring bcmath xml

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer files first (for better layer caching)
COPY composer.json composer.lock* /var/www/html/

# Install PHP dependencies (no-dev, optimized autoloader)
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader || composer install --no-interaction

# Copy the rest of the application
COPY . /var/www/html

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Build caches (if you want; these require APP_KEY sometimes but are safe to run)
# We'll run them at container runtime if variables are present. Keep commented if you prefer.
# RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose the web server port (Apache default)
EXPOSE 80

# Use Apache's foreground command to keep container running
CMD ["apache2-foreground"]
