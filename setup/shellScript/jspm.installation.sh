#!/bin/bash

#⭐ JSPM
# install JSPM using npm: works only with beta version 0.17.0-beta.25 https://github.com/jspm/jspm-cli/releases/tag/0.17.0-beta.4
# npm install -g jspm@beta
# npm install -g jspm@0.17.0-beta.35
npm install -g jspm@beta
# Bower Endpoint to allow installation from Bower sources - for beta version there is no need for bower endpoint
npm install -g jspm-bower-endpoint
jspm registry create bower jspm-bower-endpoint
