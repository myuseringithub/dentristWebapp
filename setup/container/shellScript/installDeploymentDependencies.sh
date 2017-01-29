#!/bin/bash
# This file installs dependencies needed for deployment.

apt-get update

#⭐ Nodejs installation: Already installed from image.
# installer - https://github.com/tj/n .
npm install n -g
# curl -sL https://deb.nodesource.com/setup_7.x | bash -
# apt-get install -y nodejs
# Or using n installer:
n stable
# Nodejs Nightly - latest nightly release
# build releases - https://nodejs.org/download/nightly/
NODE_MIRROR=https://nodejs.org/download/nightly/ n v8.0.0-nightly20170126a67a04d765
# Choose nightly as active node version.
n v8.0.0-nightly20170126a67a04d765
node -v
node -p process.versions # evaluates argument as javascript and prints result.
# "--harmony" flag should be used to run latest unstable features.
# node --harmony `which gulp` <task>
# node --harmony gulpfile.js

#⭐ PHP7
apt-get install -y apt-transport-https lsb-release ca-certificates;
wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg;
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list;
apt-get update -y
apt-get install php7.1 -y
# apt-get install php-pear -y
apt-get install php7.1-zip -y
# # install php zip extension using PECL (PEAR's sister) - http://blogs.fsfe.org/samtuke/?p=333
# pecl install zip

#⭐ Install Bower:
npm install -g bower

#⭐ install Gulp
# npm install gulp -g;
npm install gulpjs/gulp.git#4.0 -g
npm install gulp-cli -g;

#⭐ rsync global installation - required by gulp-rsync
apt-get install rsync -y

#⭐ JSPM
# install JSPM using npm: works only with beta version 0.17.0-beta.25 https://github.com/jspm/jspm-cli/releases/tag/0.17.0-beta.4
# npm install -g jspm@beta
# npm install -g jspm@0.17.0-beta.35
npm install -g jspm@beta
# Bower Endpoint to allow installation from Bower sources - for beta version there is no need for bower endpoint
npm install -g jspm-bower-endpoint
jspm registry create bower jspm-bower-endpoint

#⭐ Git - install git:
apt-get install -y git-all
# for adding "add-apt-repository" command. 
# apt-get install -y software-properties-common
# apt-get install python3-software-properties
# apt-get install python-software-properties

#⭐ Composer - run in a subshell, so that current directory is not changed.
(cd ~; curl -sS https://getcomposer.org/installer | php; mv composer.phar /usr/local/bin/composer)

