#!/bin/bash

set -ex; 

#⭐ Gulp - run bulid tasks (Gulp Tasks)
# Should migrate to gulp 4 to use one command for sequential tasks. Copies source --to--> "/app"
cd /tmp/build/gulp_buildTool/;
gulp copyAllFiles
gulp buildSouceCode

#⭐ install dependencies / node modules (from packages.json)
(cd /tmp/build/gulp_buildTool/; \
npm update)

#⭐ Bower Components (web elements) - 
# Install packages from bower.json:
(cd /app/clientSide/bower_packageManager/; \
bower install --allow-root)
# with config.directory option - Need to check if working instead of using .bowersrc https://github.com/rse/grunt-bower-install-simple https://github.com/bower/bower/issues/212 
# bower --config.directory=/app/ install --allow-root)

#⭐ JSPM Libraries (Javascript libraries) - 
# Install NPM & JSPM packages:
(cd /app/clientSide/jspm_packages_modules/; \
jspm install)

#⭐ Template System plugin:
(mkdir -p /app/serverSide/wordpressPlugins_mustUsePlugins/; \
cd /app/serverSide/wordpressPlugins_mustUsePlugins/; \
# check if repo already exists - Clone a git repo if it does not exist, or pull into it if it does exist
if [ ! -d ./SZN_template_system/.git ]
then
    git clone https://github.com/myuseringithub/SZN_template_system.git;
else
    (cd ./SZN_template_system
    git pull https://github.com/myuseringithub/SZN_template_system.git;)
fi
cd ./SZN_template_system/dependencies/services_composer_dependencyManager/; \
composer update;)

#⭐ Plugins updated automatically using PHP Composer package manager
# Pass destination directory using CLI instead of in the composer.json file.
# http://stackoverflow.com/questions/37314731/how-to-pass-a-variable-to-composer-json-through-the-command-line
# https://getcomposer.org/doc/03-cli.md
# Install Composer packages:
(cd /app/serverSide/wordpressPlugins_composer_dependencyManager/; \
composer install)

# Keep container running
# tail -F -n0 /etc/hosts
