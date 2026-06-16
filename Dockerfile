FROM php:8.2-apache

# enable apache rewrite
RUN a2enmod rewrite

# allow .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl

# install mysqli extension
RUN docker-php-ext-install mysqli

# configure file upload limits (64MB)
RUN echo "upload_max_filesize = 64M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/uploads.ini

# install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# set working directory
WORKDIR /var/www/html

# copy project files
COPY . .

# install php dependencies
RUN composer install --no-dev --optimize-autoloader

# set correct ownership for Apache www-data user
RUN chown -R www-data:www-data /var/www/html
