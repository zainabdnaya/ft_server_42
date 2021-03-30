# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: zdnaya <zdnaya@student.42.fr>              +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/01/28 02:36:20 by zdnaya            #+#    #+#              #
#    Updated: 2020/01/28 02:37:56 by zdnaya           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian:buster
RUN apt-get update
RUN apt-get install -y nginx
RUN apt-get install -y vim
RUN apt-get install -y mariadb-server
RUN apt-get install -y php-mbstring php-zip php-gd php-xml php-pear php-gettext php-cli php-fpm php-cgi php-mysql
RUN apt-get install -y wget
RUN apt-get install -y libnss3-tools
COPY srcs/all_config.sh ./
COPY srcs/wordpress /var/www/html/wordpress
COPY srcs/default ./root
COPY srcs/all_config.sh .
COPY srcs/config.inc.php ./root
RUN mv /root/default /etc/nginx/sites-available/default
RUN service mysql start && \
    mysql -u root -e "CREATE DATABASE wordpress;GRANT ALL PRIVILEGES ON wordpress.* TO 'root'@'localhost';\
    FLUSH PRIVILEGES;update mysql.user set plugin = 'mysql_native_password' where user='root';"
RUN cd &&\
    wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-english.tar.gz &&\
    mkdir /var/www/html/phpmyadmin && \
    tar xzf phpMyAdmin-4.9.0.1-english.tar.gz --strip-components=1 -C /var/www/html/phpmyadmin &&\
    rm -rf  phpMyAdmin-4.9.0.1-english.tar.gz /var/www/html/phpmyadmin/config.sample.inc.php &&\
    cp /root/config.inc.php /var/www/html/phpmyadmin
RUN chown -R www-data:www-data /var/www/* &&\
    chmod -R 755 /var/www/*
RUN service mysql start && \
    mysql -e "GRANT SELECT, INSERT, UPDATE, DELETE ON phpmyadmin.* TO 'zainab'@'localhost' IDENTIFIED BY 'password';GRANT ALL PRIVILEGES ON *.* TO 'zainab'@'localhost' IDENTIFIED BY 'password' WITH GRANT OPTION;"
RUN mkdir ~/mkcert &&\
    cd ~/mkcert &&\
    wget https://github.com/FiloSottile/mkcert/releases/download/v1.1.2/mkcert-v1.1.2-linux-amd64 &&\
    mv mkcert-v1.1.2-linux-amd64 mkcert &&\
    chmod +x mkcert &&\
    ./mkcert -install &&\
    ./mkcert localhost
ENTRYPOINT ./all_config.sh

