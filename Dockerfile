FROM php:8.3-fpm-alpine

# set your user name, ex: user=carlos
ARG user=je4npw
ARG uid=1000

# Install system dependencies
RUN apk update && apk add --no-cache \
    git \
    curl \
    libpng \
    libpng-dev \
    libxml2 \
    libxml2-dev \
    zip \
    unzip \
    $PHPIZE_DEPS \
    freetype-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    gettext-dev \
    gmp-dev \
    libzip-dev \
    openssl-dev \
    krb5-dev \
    libxslt-dev \
    oniguruma-dev \
    linux-headers \
    nodejs \
    npm

# Clear cache
RUN rm -rf /var/cache/apk/*

# Configure and install GD separately
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install -j$(nproc) gd

# Install other PHP extensions separately
RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install sockets \
    && docker-php-ext-install gettext \
    && docker-php-ext-install gmp \
    && docker-php-ext-install zip \
    && docker-php-ext-install xsl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN addgroup -g $uid -S $user && \
    adduser -u $uid -S $user -G $user && \
    mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

USER $user
