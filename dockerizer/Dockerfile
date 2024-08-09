FROM webdevops/php-nginx:8.2-alpine

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
WORKDIR /app
COPY composer.json composer.lock ./
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-interaction --no-scripts

COPY . ./
RUN composer dump-autoload
# Ensure directories exist and set permissions
RUN mkdir -p /app/storage/logs /app/bootstrap/cache \
    && chown -R www-data:www-data /app/storage /app/bootstrap/cache /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache \
    && chmod o+w /app/storage/framework/sessions \
    && chmod o+w /app/storage/framework/views
    # composer dump-autoload

    # chmod o+w /app/storage/framework/sessions
    # chmod o+w /app/storage/framework/views
