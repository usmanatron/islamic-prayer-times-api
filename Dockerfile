FROM php:7.4.4-fpm-alpine3.11

RUN docker-php-ext-install calendar

RUN apk add nano nginx supervisor && \
    rm -rf /var/lib/apt/lists/*

# Override settings with copy in rootfs
COPY src /var/www/html
COPY rootfs /

RUN mkdir -p /run/nginx && \
    chmod +x /root/*.sh && \
    /root/install_composer.sh

RUN cd /var/www/html && \
    php composer.phar install

EXPOSE 80

CMD "/usr/bin/supervisord" "-nc" "/etc/supervisor/supervisord.conf"