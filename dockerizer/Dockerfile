FROM webdevops/php-nginx:8.2-alpine

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
COPY . /app
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN cd /app
RUN composer update

