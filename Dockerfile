FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar composer.json y composer.lock para aprovechar la caché de capas de Docker
COPY composer.json composer.lock ./

# Instalar dependencias de Laravel
RUN composer install --no-dev --no-scripts --no-autoloader

# Copiar el resto del código de la aplicación
COPY . .

# Generar autoloader optimizado
RUN composer dump-autoload --no-dev --optimize

# Ajustar permisos
RUN chmod -R 777 storage bootstrap/cache

# Exponer puerto para artisan serve
EXPOSE 8000

# Comando para iniciar Artisan Serve
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]