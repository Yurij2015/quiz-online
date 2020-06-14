FROM php:7.3-apache
RUN docker-php-ext-install mysqli
RUN pecl install xdebug-2.7.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN echo "extension=pdo_mysql" >> /usr/local/etc/php/php.ini
#FROM php:5.6-apache
#RUN docker-php-ext-install mysqli
#RUN pecl install xdebug-2.5.5
#RUN docker-php-ext-enable xdebug
#RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
#RUN docker-php-ext-install mysqli pdo pdo_mysql
#RUN echo "extension=pdo_mysql" >> /usr/local/etc/php/php.ini