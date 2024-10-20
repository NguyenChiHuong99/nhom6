# Bước 1: Lựa chọn hình ảnh cơ sở (base image)
FROM php:8.2-fpm

# Bước 2: Cài đặt các phần mềm phụ thuộc
# Cài đặt các phần mềm cần thiết như hệ thống và các extension PHP cần cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Bước 3: Cài đặt Composer (Trình quản lý thư viện PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Bước 4: Sao chép mã nguồn của ứng dụng vào container
WORKDIR /var/www
COPY . .

# Bước 5: Cài đặt các thư viện PHP của Laravel thông qua Composer
RUN composer install --no-scripts --no-autoloader

# Bước 6: Cấp quyền cho các thư mục cần thiết
RUN chown -R www-data:www-data /var/www && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Bước 7: Xây dựng autoload cho Composer
RUN composer dump-autoload --optimize

# Bước 8: Chạy lệnh để tạo key ứng dụng Laravel (nếu cần)
RUN php artisan key:generate

# Cổng mà container sẽ lắng nghe
EXPOSE 9000

# Bước 9: Chạy PHP-FPM
CMD ["php-fpm"]
