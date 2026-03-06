FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysqli \
    && rm -rf /var/lib/apt/lists/*

# Remove default Apache page FIRST
RUN rm -f /var/www/html/index.html

# Copy your project files
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

# Set index.php as default page
RUN echo "DirectoryIndex index.php index.html" > /etc/apache2/mods-enabled/dir.conf

ENV APACHE_RUN_USER=www-data
ENV APACHE_RUN_GROUP=www-data
ENV APACHE_LOG_DIR=/var/log/apache2

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
