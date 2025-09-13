# === Base Image PHP + Apache ===
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# === Copy project ke container ===
COPY . .

# === Install system dependencies ===
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# === Enable Apache mod_rewrite ===
RUN a2enmod rewrite

# === Set Apache document root ke public/ ===
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# === Set permissions folder Laravel ===
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# === Install Node dependencies & build Vite assets ===
RUN npm install
RUN npm run build

# === Expose default HTTP port ===
EXPOSE 80

# === Start Apache in foreground ===
CMD ["apache2-foreground"]
