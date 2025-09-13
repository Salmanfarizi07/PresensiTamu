# Stage 1: Build assets
FROM node:18-bullseye AS build

WORKDIR /app

# Copy package.json & install deps
COPY package*.json ./
RUN npm install

# Copy project frontend
COPY . .

# Build Vite assets
RUN npm run build

# Stage 2: PHP + Apache
FROM php:8.2-apache

# Working directory
WORKDIR /var/www/html

# Install dependencies untuk Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    libicu-dev \
    pkg-config \
    zlib1g-dev \
    libssl-dev \
    && docker-php-ext-install pdo_mysql mbstring tokenizer xml ctype zip intl

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy PHP project
COPY . .

# Copy build assets dari stage 1
COPY --from=build /app/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose port Apache
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
