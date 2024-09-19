# Definindo a imagem base
FROM php:8.3.1

# Atualizando o sistema e instalando dependências
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Definindo o diretório de trabalho
WORKDIR /var/www/html

# Copiando o código-fonte da aplicação
COPY . .

# Criando diretórios para permissões e cache
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

# Ajustando permissões dos diretórios para o usuário do Apache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expondo a porta 8000 para a aplicação
EXPOSE 8000

# Definindo o comando para iniciar o servidor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
