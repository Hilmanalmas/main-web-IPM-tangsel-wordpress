# Menggunakan image resmi WordPress berbasis Apache dan PHP 8.2
FROM wordpress:6-php8.2-apache

# Mengubah batas memori dan upload default untuk memastikan performa yang baik
RUN echo "upload_max_filesize = 1024M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 1024M" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "memory_limit = 1024M" >> /usr/local/etc/php/conf.d/uploads.ini

# Mengaktifkan Apache mod_rewrite untuk Permalinks WordPress yang rapi
RUN a2enmod rewrite

# Copy the entire wordpress directory into the container
COPY . /var/www/html/

# Mengubah hak akses kepemilikan agar sesuai dengan server web Apache
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
