FROM dunglas/frankenphp

RUN install-php-extensions \
    pcntl \
    pdo_mysql

COPY . /app
WORKDIR /app

CMD ["php", "artisan", "octane:frankenphp"]
