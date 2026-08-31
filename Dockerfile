# --- Image de base : PHP 8.3 + Apache (correspond a "php": "^8.3" dans composer.json) ---
FROM php:8.3-apache

# Dependances systeme necessaires pour compiler les extensions PHP de Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP requises par Laravel (pdo_mysql pour parler a MySQL, gd pour les images, etc.)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Active le module Apache mod_rewrite (indispensable pour les routes Laravel)
RUN a2enmod rewrite

# Remplace le vhost Apache par defaut pour pointer vers /public (dossier public de Laravel)
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Installe Composer (recupere depuis l'image officielle Composer, sans installateur manuel)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Repertoire de travail = racine du projet Laravel a l'interieur du conteneur
WORKDIR /var/www/html

# Copie tout le code source de l'application dans l'image
COPY . .

# Installe les dependances PHP (sans les paquets de dev, optimise pour la prod)
RUN composer install --no-dev --optimize-autoloader

# Laravel a besoin d'ecrire dans storage/ et bootstrap/cache/
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Port applicatif expose par Apache
EXPOSE 80