FROM --platform=linux/amd64 php:8.2-apache
RUN rm -rf /etc/apache2/sites-enabled/000-default.conf
# Enable mod_rewrite module for .htaccess support
RUN a2enmod rewrite

# Enable mod_negotiation for content negotiation
# negotiation will can be run Options +MultiViews
RUN a2enmod negotiation

# Enable MultiViews option for file matching
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# FOR MYSQLi
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y

# FOR SQL SERVER
ENV ACCEPT_EULA=Y
RUN apt-get update && apt-get install -y \
    gnupg2 \
    unixodbc \
    unixodbc-dev

# Import the Microsoft repository GPG keys
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -

# Configure the Microsoft SQL Server repository
RUN curl https://packages.microsoft.com/config/debian/11/prod.list > /etc/apt/sources.list.d/mssql-release.list

# Install the SQL Server PDO driver
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    msodbcsql17 \
    mssql-tools

# Install the SQL Server extension for PHP
RUN pecl install sqlsrv pdo_sqlsrv && docker-php-ext-enable sqlsrv pdo_sqlsrv

# FOR POSTGRESQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql
