FROM webdevops/php-nginx:8.2-alpine

# Copy custom configuration files
COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf

# Set the working directory
WORKDIR /app

# Copy composer files first (to leverage Docker cache)
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-interaction --no-scripts --no-progress --prefer-dist

# Copy the rest of the application code
COPY . .

# Ensure storage and cache directories have the correct permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Optionally run additional commands, e.g., migrations or caching
# RUN php artisan migrate --force
# RUN php artisan config:cache

# Start the main process
CMD ["php-fpm"]
