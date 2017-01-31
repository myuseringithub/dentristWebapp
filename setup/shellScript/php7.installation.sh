#!/bin/bash

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
