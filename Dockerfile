FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    libjpeg-dev \
    libfreetype6-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip soap

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install AWS CLI
RUN curl "https://awscli.amazonaws.com/awscli-exe-linux-x86_64.zip" -o "awscliv2.zip" \
    && unzip awscliv2.zip \
    && ./aws/install \
    && rm -rf aws awscliv2.zip

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u 1000 -d /home/www www
RUN mkdir -p /home/www/.composer && chown -R www:www /home/www

# Set working directory again (after adding user)
WORKDIR /var/www/html

# Copy only composer files first for Docker caching
COPY composer.json composer.lock ./

# Configure git safe directory to avoid “dubious ownership” error
RUN git config --global --add safe.directory /var/www/html

# Install composer dependencies
RUN composer install --no-scripts --no-autoloader --no-interaction

# Copy rest of the application files
COPY . .

# Set permissions
RUN chown -R www:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate optimized autoload files
RUN composer dump-autoload --optimize

# Switch to non-root user
USER www

# Expose port (for php-fpm)
EXPOSE 9000

CMD ["php-fpm"]
