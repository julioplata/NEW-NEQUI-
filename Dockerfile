# Imagen base con Apache y PHP
FROM php:8.2-apache

# Instalar extensiones necesarias (ajusta si tu app usa otras)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite para que funcionen bien las rutas
RUN a2enmod rewrite

# Copiar el contenido de la carpeta public al directorio que sirve Apache
COPY ./public /var/www/html/

# Copiar también los demás archivos si son necesarios (ej: backend)
COPY . /var/www/html/

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
