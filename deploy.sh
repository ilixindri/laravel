sudo apt-get install -y php
sudo apt-get install -y php-dom
sudo apt-get install -y php-curl
sudo apt-get install -y php-zip
./composer install
sudo apt-get install -y npm
npm install
sudo apt-get install -y apache2
sudo rm /etc/apache2/sites-enabled/000-default.conf
current_folder=$(basename "$PWD")
conteudo="<VirtualHost *:80>
        # The ServerName directive sets the request scheme, hostname and port that
        # the server uses to identify itself. This is used when creating
        # redirection URLs. In the context of virtual hosts, the ServerName
        # specifies what hostname must appear in the request's Host: header to
        # match this virtual host. For the default virtual host (this file) this
        # value is not decisive as it is used as a last resort host regardless.
        # However, you must set it for any further virtual host explicitly.
        #ServerName www.example.com

        ServerAdmin webmaster@localhost
        DocumentRoot \"/var/www/$current_folder/public/\"

        <Directory \"/var/www/$current_folder/public/\">
                Options Indexes FollowSymLinks
                Require all granted
                AllowOverride all
        </Directory>

        # Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
        # error, crit, alert, emerg.
        # It is also possible to configure the loglevel for particular
        # modules, e.g.
        #LogLevel info ssl:warn

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

        # For most configuration files from conf-available/, which are
        # enabled or disabled at a global level, it is possible to
        # include a line for only one particular virtual host. For example the
        # following line enables the CGI configuration for this host only
        # after it has been globally disabled with "a2disconf".
        #Include conf-available/serve-cgi-bin.conf
</VirtualHost>"
echo "$conteudo" > "/etc/apache2/sites-enabled/000-$current_folder.conf"
sudo /etc/init.d/apache2 restart
sudo /etc/init.d/apache2 status
# cp .env.example > .env # fazer isso em production and delete by .gitignore
touch database/database.sqlite
php artisan key:generate
echo "Edite .env"
# sudo mv . /var/www/ # não é possível mover se esse script estiver dentro da pasta a ser movida