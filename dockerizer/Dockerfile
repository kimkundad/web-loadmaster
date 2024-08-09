FROM webdevops/php-nginx:8.2-alpine

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-scripts
COPY . ./

# Ensure directories exist and set permissions
RUN mkdir -p /app/storage/logs /app/bootstrap/cache
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache /app /app/storage/logs
RUN chmod -R 775 /app/storage /app/bootstrap/cache
