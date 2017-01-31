FROM node:latest
MAINTAINER SZN
COPY ./source /tmp/source

# Copy all shellScript files and make them executable.
COPY ./setup/shellScript/ /tmp/shellScript/
RUN apt-get update; \
    # Apparently when copied from windows, execution permissions should be granted.
    find /tmp/shellScript/ -type f -exec chmod +x {} \; \
    /tmp/shellScript/nodejs.installation.sh; \
    /tmp/shellScript/php7.installation.sh; \
    /tmp/shellScript/bower.installation.sh; \
    /tmp/shellScript/gulp.installation.sh; \
    /tmp/shellScript/rsync.installation.sh; \
    /tmp/shellScript/jspm.installation.sh; \
    /tmp/shellScript/git.installation.sh; \
    /tmp/shellScript/composer.installation.sh;
    