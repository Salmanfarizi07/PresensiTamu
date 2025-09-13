# Stage 1: PHP + Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install dependencies Linux & PHP extensions
# Update dan install OS dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    build-essential \
    && docker-php-ext-install pdo_mysql mbstring tokenizer xml ctype zip

# Install Node.js & npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

    
# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy composer.lock and composer.json first (cache optimization)
COPY composer.lock composer.json ./

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy project files
COPY . .

# Install Node dependencies & build Vite assets
RUN npm install
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port Apache
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
