FROM php:8.2-fpm

WORKDIR /var/www

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y unzip git curl \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar todos los archivos del backend (contexto = root = testlab/backend)
COPY . ./

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto
EXPOSE 8000

# Servir Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
