FROM php:8.2-fpm

# Instalar extensiones necesarias para Laravel y MySQL
RUN apt-get update && apt-get install -y \
    curl \
    libpq-dev \
    zip \
    unzip \
    git \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar archivos del proyecto al contenedor
COPY . .

# Ejecutar Composer para instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Establecer el comando de inicio
CMD php artisan serve --host=0.0.0.0 --port=$PORT
