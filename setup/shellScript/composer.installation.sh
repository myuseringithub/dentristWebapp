#!/bin/bash

#⭐ Composer - run in a subshell, so that current directory is not changed.
(cd ~; curl -sS https://getcomposer.org/installer | php; mv composer.phar /usr/local/bin/composer)
