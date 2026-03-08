FROM wordpress:6.4-php8.0-apache

# Copy the entire wordpress directory into the container
COPY . /var/www/html/

# Set proper ownership and permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

EXPOSE 80
