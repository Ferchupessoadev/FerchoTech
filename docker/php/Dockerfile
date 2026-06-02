# ==========================================
# Base (PHP + Node.js + Extensiones)
# ==========================================
FROM php:8.4-fpm AS base

# Instalar dependencias del sistema y Node.js (v20 o la que prefieras)
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Corrección del typo (COPU -> COPY)
COPY ./package.json ./

# ==========================================
# DEV
# ==========================================
FROM base AS dev

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN groupmod -g 1000 www-data && usermod -u 1000 www-data
USER www-data

WORKDIR /var/www/html

COPY package.json ./

# Comando para desarrollo (Vite / Mix)
CMD ["npm", "run", "dev"]

# ==========================================
# PROD
# ==========================================
FROM base AS prod

# 1. Copiar solo dependencias para aprovechar la caché
COPY composer.json composer.lock ./
COPY package.json ./

# Instalar dependencias de Node y compilar assets
RUN npm install && npm run build

# 2. Instalar dependencias de Composer sin scripts
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-scripts

# 3. Copiar el resto del proyecto con los permisos correctos
COPY --chown=www-data:www-data . .

# 5. Asegurar permisos de Laravel
RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# 6. Optimizar Laravel
RUN php artisan key:generate || true \
    && php artisan package:discover || true \
    && php artisan config:cache || true \
    && php artisan route:cache || true \
    && php artisan view:cache || true

# 7. Usuario final y comando de inicio
RUN groupmod -g 1000 www-data && usermod -u 1000 www-data
USER www-data

EXPOSE 9000
CMD ["php-fpm"]
