FROM php:7.4.4-fpm-alpine3.11

RUN apk add nano nginx supervisor && \
    rm -rf /var/lib/apt/lists/*

COPY rootfs /
RUN mkdir -p /run/nginx && \
    chmod +x /root/*.sh && \
    /root/install_composer.sh

COPY src /var/www/html
RUN cd /var/www/html && \
    php composer.phar install

VOLUME ["/var/www/html"]
EXPOSE 80

CMD "/usr/bin/supervisord" "-nc" "/etc/supervisor/supervisord.conf"