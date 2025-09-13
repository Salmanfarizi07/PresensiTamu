FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libsodium-dev \
    libpq-dev \
    default-mysql-client \
    default-libmysqlclient-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN curl -sl https://deb.nodesource.com/setup_18.x | bash && \
    apt-get update && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Copy project
COPY . /var/www/html/

# Set document root ke public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Enable rewrite module
RUN a2enmod rewrite

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port used by `php artisan serve`
EXPOSE 8000

# Install PHP and JS dependencies
RUN composer install
RUN npm install

# Run Laravel migrations and start server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
