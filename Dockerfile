# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Instalar dependencias de PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip libpq-dev libxml2-dev curl \
    && docker-php-ext-install dom xml

# Instalar Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

    # Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar extensiones de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar el código fuente desde el contexto de construcción
COPY . /var/www/html

# Instalar dependencias de Node.js
RUN npm install

# Compilar assets usando Vite
RUN npm run build

# Exponer el puerto 80 (por defecto para Apache)
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
