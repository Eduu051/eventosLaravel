---------- ARGUMENTOS ----------
ARG user=edualdo
ARG uid=1002

---------- INSTALAR DEPENDENCIAS ----------
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

---------- EXTENSIONES PHP ----------
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip
---------- INSTALAR NODE Y NPM ----------
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && node -v \
    && npm -v
---------- COMPOSER ----------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

---------- CREAR USUARIO NO ROOT ----------
RUN useradd -G www-data,root -u $uid -d /home/$user -m $user
RUN mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

---------- DIRECTORIO DE TRABAJO ----------
WORKDIR /var/www

---------- CAMBIAR A USUARIO NO ROOT ----------
USER $user

---------- COMANDO POR DEFECTO ----------
CMD ["php-fpm"]