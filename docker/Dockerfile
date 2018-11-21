FROM ubuntu:xenial


ENV OS_LOCALE="en_US.UTF-8"
RUN apt-get update && apt-get install -y locales && locale-gen ${OS_LOCALE}
ENV LANG=${OS_LOCALE} \
    LANGUAGE=${OS_LOCALE} \
    LC_ALL=${OS_LOCALE} \
    DEBIAN_FRONTEND=noninteractive

ENV APACHE_CONF_DIR=/etc/apache2 \
    PHP_CONF_DIR=/etc/php/7.2 \
    PHP_DATA_DIR=/var/lib/php


COPY entrypoint.sh /sbin/entrypoint.sh

RUN dpkg-reconfigure locales
RUN apt-get install --no-install-recommends -y software-properties-common python-software-properties
RUN add-apt-repository -y ppa:ondrej/php 
RUN add-apt-repository -y ppa:ondrej/apache2 
RUN apt-get update 
RUN apt-get install -y curl apache2 libapache2-mod-php7.2 php7.2-cli php7.2-readline php7.2-mbstring php7.2-zip php7.2-intl php7.2-xml php7.2-json php7.2-curl php7.2-gd php7.2-pgsql php7.2-mysql php7.2-pdo php7.2-pgsql

# Apache settings
RUN cp /dev/null ${APACHE_CONF_DIR}/conf-available/other-vhosts-access-log.conf
RUN rm ${APACHE_CONF_DIR}/sites-enabled/000-default.conf ${APACHE_CONF_DIR}/sites-available/000-default.conf
RUN a2enmod rewrite php7.2

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=1.6.4 --install-dir=/usr/local/bin --filename=composer

# Cleaning
RUN apt-get autoremove -y 
RUN rm -rf /var/lib/apt/lists/* 

# Forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/apache2/access.log 
RUN ln -sf /dev/stderr /var/log/apache2/error.log 
RUN chmod 755 /sbin/entrypoint.sh
RUN chown www-data:www-data ${PHP_DATA_DIR} -Rf 
RUN composer global require "hirak/prestissimo:^0.3" 

WORKDIR /var/www

EXPOSE 80 443

# By default, simply start apache.
CMD ["/sbin/entrypoint.sh"]