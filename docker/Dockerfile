# create PHP 7.4 image with apache
FROM php:7.4-apache-bullseye

USER root

# get php extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable pdo_mysql

# get lastest composer
RUN curl -sS https://getcomposer.org/installer | php -- --disable-tls && \
    mv composer.phar /usr/local/bin/composer

# get lastest nodejs
RUN curl -fsSL https://deb.nodesource.com/setup_19.x | bash - && \
    apt install -y nodejs

# apply user www-data on /var/www
COPY --chown=www-data:www-data . /var/www

# get apache.conf local
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

# install
RUN cd /var/www/ && composer install
# RUN npm install --force

# set current space directory
WORKDIR /var/www/

# execute artisan x migrations x seeds for data sets test
# RUN chmod +x docker/docker.sh
# ENTRYPOINT ["docker/docker.sh"]

# USER mysql
RUN mkdir -p /var/lib/mysql/
RUN chmod 644 /var/lib/mysql/

# open 80 port
EXPOSE 80
