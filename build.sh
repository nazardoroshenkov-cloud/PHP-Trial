#!/bin/sh

# Скачиваем Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Устанавливаем Composer
php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Удаляем установщик
php -r "unlink('composer-setup.php');"

# Устанавливаем зависимости проекта
composer install --no-dev --optimize-autoloader