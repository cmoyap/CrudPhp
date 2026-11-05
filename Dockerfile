FROM php:8.2-apache

# Instalar librerías del sistema y extensiones de PHP para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Habilitar mod_rewrite de Apache (opcional, útil para URLs limpias)
RUN a2enmod rewrite