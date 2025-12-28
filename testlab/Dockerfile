FROM php:8.4-cli

# Instalar dependencias del sistema y extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    && docker-php-ext-install dom mbstring pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copiar proyecto
COPY testlab/BACKEND /app

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Limpiar cache (opcional pero recomendable)
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

# Ejecutar migraciones automáticamente
RUN php artisan migrate --force

# Exponer puerto Railway
EXPOSE 8080

# Arrancar Laravel
CMD php -S 0.0.0.0:${PORT:-8080} -t public
