#!/bin/bash

# Previously used to load official wordpress dockerfile.
# # mute CMD from official wordpress image
# sed -i -e 's/^exec "$@"/#exec "$@"/g' /usr/local/bin/docker-entrypoint.sh
# # execute bash script from official wordpress image
# source docker-entrypoint.sh
# # execute CMD
# exec "$@"

# 😄 SZN:
echo "SZN - Content & Configurations for Apache, PHP, & Wordpress";
# Run only when folders are empty:
if [ "$(ls -A '/app')" ] || [ "$(ls -A '/etc/apache2/sites-available')" ]; then
    echo "SZN - folders not empty. Preventing recopying to volumes."
else
    echo "SZN - folders are empty"

    set -ex; 

    #⭐ Apache configs, SSL certificates, apache2.conf
    mkdir -p /etc/apache2/ssl/; cp -pr /tmp/content/sslCertificate/* /etc/apache2/ssl/
    cp -p /tmp/source/serverSide/apacheServer/apache2.conf /etc/apache2/
    cp -pr /tmp/source/serverSide/apacheServer/virtualHostsConfigurations/* /etc/apache2/sites-available/
    a2ensite configurationsLoader.conf;
    # Reloading apache2 causes all subsequent commands to be ignored, as it stops the container and restarts.
    # service apache2 reload;

    #⭐php.ini
    cp -p /tmp/source/serverSide/phpConfiguration/php.ini /usr/local/etc/php/
    
    #⭐ Copy content to desired destination:
    # Config 
    mkdir -p /app/wordpressConfiguration/; cp -pr /tmp/content/wordpressConfiguration/* /app/wordpressConfiguration/
    # Root
    # Directory must not exist (in order to copy hidden files).
    # mkdir -p /app/root/; 
    cp -pr /tmp/source/clientSide/root/ /app/root/
    # SZN COMPATIBILITY - changing "app" to "assets" throws an error 500 in "/mcq" page. (if folder doesn't exist, its created and teh contents of the source are copied into it)
    mkdir -p /app/root/app/; cp -pr /tmp/source/clientSide/assets/* /app/root/app/
    # wp-content
    mkdir -p /app/root/content/; # cp -pr /tmp/content/wp-content/* /app/root/content/
    mkdir -p /app/root/content/mu-plugins; cp -pr /tmp/source/serverSide/wordpressPlugins_mustUsePlugins/* /app/root/content/mu-plugins/
    mkdir -p /app/root/content/uploads; cp -pr /tmp/content/wordpressUploads/* /app/root/content/uploads/
    mkdir -p /app/root/content/themes/routing/; cp -pr /tmp/source/clientSide/routing/* /app/root/content/themes/routing/
    # Plugins Manaually updated
    mkdir -p /app/root/content/plugins/; cp -pr /tmp/content/wordpressPlugins_manuallyUpdated/* /app/root/content/plugins/

    #⭐ Plugins updated automatically using PHP Composer package manager
    # install git as a requirement:
    apt-get install -y git-all
    # for adding "add-apt-repository" command. 
    # apt-get install -y software-properties-common
    # apt-get install python3-software-properties
    # apt-get install python-software-properties
    # Composer - run in a subshell, so that current directory is not changed.
    (cd ~; curl -sS https://getcomposer.org/installer | php; mv composer.phar /usr/local/bin/composer)
    # install php zip extension using PECL (PEAR's sister) - http://blogs.fsfe.org/samtuke/?p=333
    pecl install zip
    # Pass destination directory using CLI instead of in the composer.json file.
    # http://stackoverflow.com/questions/37314731/how-to-pass-a-variable-to-composer-json-through-the-command-line
    # https://getcomposer.org/doc/03-cli.md
    # Install Composer packages:
    (cd /tmp/source/serverSide/wordpressPlugins_composer_dependencyManager/; \
    composer install)

    #⭐ Template System plugin:
    (cd /app/root/content/mu-plugins/; \
    git clone https://github.com/myuseringithub/SZN_template_system.git; \
    cd ./SZN_template_system/dependencies/services_composer_dependencyManager/; \
    composer update;)

    #⭐Bower Components (web elements) - 
    # Nodejs installation:
    curl -sL https://deb.nodesource.com/setup_7.x | bash -
    apt-get install -y nodejs
    # Install Bower:
    npm install -g bower
    # Install packages from bower.json:
    (cd /tmp/source/clientSide/bower_packageManager/; \
    bower install --allow-root)
    # with config.directory option - Need to check if working instead of using .bowersrc https://github.com/rse/grunt-bower-install-simple https://github.com/bower/bower/issues/212 
    # bower --config.directory=/app/ install --allow-root)

    #⭐ JSPM Libraries (Javascript libraries) - 
    # install JSPM using npm: works only with beta version 0.17.0-beta.25 https://github.com/jspm/jspm-cli/releases/tag/0.17.0-beta.4
    curl -sL https://deb.nodesource.com/setup_7.x | bash -
    apt-get install -y nodejs
    npm install -g jspm@beta
    # Bower Endpoint to allow installation from Bower sources - for beta version there is no need for bower endpoint
    npm install -g jspm-bower-endpoint
    jspm registry create bower jspm-bower-endpoint
    # Install NPM & JSPM packages:
    (cd /tmp/source/clientSide/jspm_packages_modules/; \
    jspm install)
    # move to desired location: 
    mkdir -p /app/root/app/sharedApp/javascripts/jspm_packages/;
    mv /tmp/source/clientSide/jspm_packages_modules/jspm_packages/* /app/root/app/sharedApp/javascripts/jspm_packages/
    
    #⭐ Copy Wordpress from downloaded directory. Change Wordpress default directory. $_ = last argument passed to last command. Copy from downloaded wordpress (forked from official docker image - https://github.com/docker-library/wordpress/blob/master/docker-entrypoint.sh)
    mkdir -p /app/root/site;
    tar cf - --one-file-system -C /usr/src/wordpress . | tar xf - -C /app/root/site
    
    # "mv" to volume doesn't work !!! BECAUSE IT IS A VOLUME, WHICH I CANNOT CONTROL. RUN cp -pr /var/www/html/* /app/root/site/;
        
    #⭐ Give corrent permissions: 
    # It appears that data in volumes get "staff" as group, and changing permissions needs a workaround.
    chown -R www-data:www-data /app/;
    find /app/ -type f -exec chown -R www-data:www-data {} \;
    find /app/ -type f -exec chmod -R 644 {} \;
    find /app/ -type d -exec chmod -R 755 {} \;
    # https://github.com/boot2docker/boot2docker/issues/587 - change permissions and ownership from docker "staff" to "www-data"
    # There is staff, 1000, www-data groups and users when using volumes. (Should read more about them)
    usermod -u 1000 www-data

    #⭐ Remove tmp files:
    rm -r /tmp/*


fi


