#!/bin/bash

source $(dirname -- "$0")/isInstalled.sh

if [ $(programIsInstalled node) == "false" ]; then 
    # Install Nodejs
    curl -sL https://deb.nodesource.com/setup_7.x | bash -; \
    apt-get install -y nodejs; \
fi;

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
